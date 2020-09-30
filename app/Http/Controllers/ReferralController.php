<?php

namespace App\Http\Controllers;

use View;

use Apps\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ReferralController extends Controller
{
    public function index()
    {   
        
        return View::make('pages.acara.referral');
    }
}
