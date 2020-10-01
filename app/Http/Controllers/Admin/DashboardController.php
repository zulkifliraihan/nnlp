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
        $users = User::with('mengundang','diundang')->get();
        $pemenang = ReferrCount::with('user')->orderBy('jumlah', 'desc')->limit(3)->get();

        $data = array(
            'users' => $users,
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
