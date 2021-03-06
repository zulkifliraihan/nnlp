<?php

namespace App\Http\Controllers\Admin;

use View;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\ReferrCountTerverifikasi;

use App\Exports\UsersExport;
use App\Imports\OrderOnlineImport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('admin/login');
        }
        
        if(request()->ajax()) {
            $query = User::with('mengundang','diundang', 'pembayaran.file')->where('email', '!=', 'admin@lpkn.org')->orderBy('id', 'desc');

            return datatables()->of($query)
                ->addColumn('mengundang', function($query){
                    $counter = 0;
                    $ret = '<div class="flex">';
                    if(!empty($query->mengundang)){
                        foreach($query->mengundang as $item){
                            if($counter > 2){
                                break;
                            }else{
                                $ret .= '
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="img" class="tooltip rounded-full"
                                        src="https://avatars.dicebear.com/api/initials/'.$item->name.'.svg"
                                        title="'.$item->name.'">
                                </div>
                                ';
                                $counter++;
                            }
                        }
                        
                        if($counter > 2 && ($query->mengundang->count() - $counter) != 0){
                            $diff = $query->mengundang->count() - $counter;
                            $ret .= '
                            <div class="w-10 h-10 image-fit">
                                <div class="rounded-full text-center">
                                    '. number_format($diff,0,',','.') .' +
                                </div>
                            </div>
                            ';
                        }
                        $ret .= '</div>';
                    }else{
                        $ret .= '</div>';
                    }
                    return $ret;
                })
                ->addColumn('total_mengundang', function($query){
                    return isset($query->mengundang) ? number_format(count($query->mengundang),0,',','.') : 0;
                })
                ->addColumn('diundang_oleh', function($query){
                    return isset($query->diundang) ? $query->diundang->name : "";
                })
                ->addColumn('bukti_pembayaran', function($query){
                    return isset($query->pembayaran) && isset($query->pembayaran->file) ? "<img src='".asset('uploads/'.$query->pembayaran->file->path)."' class='h-16 w-auto' data-action='zoom'>" : "";
                })
                ->addColumn('total_tagihan', function($query){
                    $id = $query->id;
                    $total = 145000 + $id;

                    return 'Rp ' . number_format($total,0, ',', '.');
                })
                ->addColumn('status_pembayaran', function($query){
                    if($query->status_pembayaran == 0){
                        return '
                        <span class="px-2 py-1 rounded-full bg-theme-12 text-white mr-1">Belum diverifikasi</span>
                        ';
                    }else{
                        return '
                        <span class="px-2 py-1 rounded-full bg-theme-1 text-white mr-1">Terverifikasi</span>
                        ';
                    }
                })
                ->addColumn('button_proses', function($query){
                    if ($query->status_pembayaran == 1) {
                        return '<button class="button inline-block bg-gray-700 text-white float-right" disabled>Proses</button';
                    } else {
                        return '<button class="button inline-block bg-theme-1 text-white float-right" onclick="proses_pembayaran('.$query->id.')">Proses</button';
                    }
                    
                })
                ->rawColumns(['mengundang', 'total_mengundang', 'diundang_oleh', 'status_pembayaran', 'bukti_pembayaran', 'button_proses'])
                ->addIndexColumn()
                ->make(true);
        }

        $users = User::query()->with('mengundang','diundang')->where('email', '!=', 'admin@lpkn.org');
        $pemenang = ReferrCountTerverifikasi::with('user')->orderBy('jumlah', 'desc')->limit(10)->get();

        $data = array(
            'total_user' => $users->count(),
            'total_user_terverifikasi' => $users->where('status_pembayaran', 1)->count(),
            'pemenang' => $pemenang
        );

        return View::make('pages.admin.dashboard', $data);
    }

    public function proses($id){
        $user = User::find($id);

        if (!$user) {
            return response([
                'ok' => false,
                'data' => [
                    'message' => 'Pendaftar tidak ditemukan'
                ]
            ],422);
        }

        $user->status_pembayaran = 1;
        $user->save();

        $user = User::with('mengundang:ref_by,name,instansi','diundang')->where('id', $id)->first();

        Mail::to($user->email)->send(new OrderShipped('Pendaftaran Berhasil!', $user));

        return response([
            'ok' => true,
            'data' => [
                'message' => 'Pendaftar Status berhasil diproses'
            ]
        ],200);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'Export User Data Referral Program.xlsx');
    }

    public function import_order_online(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, array(
            'file' => "required|mimes:xls,xlsx",
        ));

        if ($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages' => $validator->errors()->first(),
            ], 422);
        }

        Excel::import(new OrderOnlineImport, request()->file('file'));

        return response()->json([
            'status'    => "ok",
            'messages' => "Data berhasil diperbarui"
        ], 200);
    }
}
