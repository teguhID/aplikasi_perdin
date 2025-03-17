<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Models\User;

class AppController extends Controller
{
    function home()
    {
        return view('landing_page.home');
    }
}
