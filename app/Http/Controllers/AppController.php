<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\contact;
use App\Models\layanan;
use App\Models\portofolio;
use App\Models\profile;
use App\Models\toko;

class AppController extends Controller
{
    public function __construct()
    {
    }

    function home()
    {
        $banner = banner::all();
        $layanan = layanan::all();
        $profile = profile::all();
        $portofolio = portofolio::all();
        $contact = contact::all();
        $toko = toko::all();

        $data = [
            'banner' => $banner,
            'layanan' => $layanan,
            'profile' => $profile,
            'portofolio' => $portofolio,
            'contact' => $contact,
            'toko' => $toko
        ];

        return view('home')->with('data', $data);
    }
}
