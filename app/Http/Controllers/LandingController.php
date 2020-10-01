<?php

namespace App\Http\Controllers;

use View;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class LandingController extends Controller
{
    public function index(Request $request){

        $params = $request->all();

        $data = array();

        if(isset($params['ref'])){
            $data['ref'] = $params['ref'];
        }

        return view('pages.landing', $data);
    }
}
