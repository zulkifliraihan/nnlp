<?php

namespace App\Http\Controllers\Admin;

use View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::with('mengundang','diundang')->get();

        $data = array(
            'users' => $users,
            'total_user' => $users->count()
        );

        return View::make('pages.admin.dashboard', $data);
    }
}
