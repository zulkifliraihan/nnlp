<?php

namespace App\Http\Controllers\Acara;

use View;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\File;
use App\Models\UserPayments;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    
    public function index(Request $request)
    {
        if(session("lpkn_ref_email")){
            return redirect()->route('referral.pendaftaran');
        }
        
        return redirect()->route('landing');

        $params = $request->all();

        $data = array();

        if(isset($params['ref'])){
            $data['ref'] = $params['ref'];
        }

        return View::make('pages.acara.register', $data);
    }

    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, array(
            'nama_lengkap' => "required",
            'email' => "required|unique:users",
            'no_hp' => "required",
            'kota' => "required",
            'jenis_kelamin' => "required",
            'ref' => "sometimes",
        ));

        if ($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages' => $validator->errors()->first(),
            ], 422);
        }

        $ref = $this->generate_referral(6);

        $input = array(
            'name' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => Hash::make($ref),
            'hp' => $data['no_hp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'kota' => $data['kota'],
            'ref' => $ref,
            'ref_by' => isset($data['ref']) ? $data['ref'] : null,
        );

        $user = User::firstOrCreate($input);

        Session::put('lpkn_ref_email', $data['email']);
        
        // $user = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', $data['email'])->first();

        // Mail::to($data['email'])->send(new OrderShipped('Pendaftaran Berhasil!', $user));

        return response()->json([
            'status'    => "ok",
            'messages' => "Berhasil registrasi acara",
            'route' => route('landing')
        ], 200);

    }

    public function update(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, array(
            'file' => "required|mimes:jpg,jpeg,png"
        ));

        if ($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages' => $validator->errors()->first(),
            ], 422);
        }

        $user = User::where('email', session('lpkn_ref_email'))->first();

        if($user){
            $uId = (string) Uuid::generate();
            $folder = "upload_pembayaran";
            $path = 'dokumen/'. ((int) ($user->id / 100)) . "/". $user->id . "/". $folder;
            $fileName = $request->file->getClientOriginalName();
    
            $path = Storage::putFile(
                $path,
                $request->file('file')
            );
    
            $filedata = [
                'name' => $fileName,
                'address' => $uId,
                'path' => $path,
                'folder' => $folder,
                'created_by' => $user->id,
                'updated_by' => $user->id
            ];
            $file = File::firstOrCreate($filedata);
    
            $input = array(
                'file_id' => $file->id
            );
    
            $UserPayments = UserPayments::updateOrCreate(['user_id' => $user->id], $input);

            return response()->json([
                'status'    => "ok",
                'messages' => "Berhasil registrasi acara",
                'route' => route('landing')
            ], 200);
        }else{
            return response()->json([
                'status'    => "fail",
                'messages' => "Session anda telah berakhir harap refresh halaman..",
            ], 422);
        }


    }

    public function generate_referral($length){
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
        return substr(str_shuffle($str_result), 0, $length);
    }
}
