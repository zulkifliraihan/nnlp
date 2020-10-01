<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class ReferralController extends Controller
{

    public function __construct(){
        if(!session("lpkn_ref_email")){
            return redirect()->route('acara.pendaftaran');
        }else{
            return redirect()->route('referral.pendaftaran');
        }
    }

    public function index()
    {   
        $users = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', session('lpkn_ref_email'))->first();

        return View::make('pages.acara.referral', ['data' => $users['mengundang']]);
    }

    public function terundang()
    {
        $users = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', session('lpkn_ref_email'))->first();

        return response($users['mengundang']);
    }
}
