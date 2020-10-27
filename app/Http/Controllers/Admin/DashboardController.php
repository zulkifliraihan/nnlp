<?php

namespace App\Http\Controllers\Admin;

use View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\ReferrCount;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $query = User::with('mengundang','diundang');

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
                ->rawColumns(['mengundang', 'total_mengundang', 'diundang_oleh'])
                ->addIndexColumn()
                ->make(true);
        }

        $users = User::query()->with('mengundang','diundang');
        $pemenang = ReferrCount::with('user')->orderBy('jumlah', 'desc')->limit(10)->get();

        $data = array(
            'total_user' => $users->count(),
            'pemenang' => $pemenang
        );

        return View::make('pages.admin.dashboard', $data);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'Export User Data Referral Program.xlsx');
    }
}
