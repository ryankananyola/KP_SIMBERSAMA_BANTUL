<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.user.dashboard_user');
    }


    public function dataUmum()
    {
        return view('dashboard.user.data_umum');
    }

    public function dataPeriodik()
    {
        return view('dashboard.user.data_periodik');
    }

    public function uploadSK()
    {
        return view('dashboard.user.upload_sk_user');
    }
}
