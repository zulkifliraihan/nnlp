<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class ReferralController extends Controller
{
    public function index()
    {   
        $users = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', 'eriksantiago@gmail.com')->first();

        return View::make('pages.acara.referral', ['data' => $users['mengundang']]);
    }

    public function terundang()
    {
        $users = User::with('mengundang:ref_by,name,instansi','diundang')->where('email', 'eriksantiago@gmail.com')->first();

        return response($users['mengundang']);
    }
}
