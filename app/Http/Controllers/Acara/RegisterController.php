<?php

namespace App\Http\Controllers\Acara;

use View;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class RegisterController extends Controller
{
    
    public function index(Request $request)
    {
        if(session("lpkn_ref_email")){
            return redirect()->route('referral.pendaftaran');
        }

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
            'nama_instansi' => "required",
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
            'instansi' => $data['nama_instansi'],
            'ref' => $ref,
            'ref_by' => isset($data['ref']) ? $data['ref'] : null,
        );

        $user = User::firstOrCreate($input);

        Session::put('lpkn_ref_email', $data['email']);

        return response()->json([
            'status'    => "ok",
            'messages' => "Berhasil registrasi acara",
            'route' => route('referral.pendaftaran')
        ], 200);

    }

    public function generate_referral($length){
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
        return substr(str_shuffle($str_result), 0, $length);
    }
}
