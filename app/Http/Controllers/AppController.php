<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\blog;
use App\Models\choose_us;
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
        $choose_us = choose_us::all();

        $data = [
            'banner' => $banner,
            'layanan' => $layanan,
            'profile' => $profile,
            'portofolio' => $portofolio,
            'contact' => $contact,
            'toko' => $toko,
            'choose_us' => $choose_us
        ];

        return view('landing_page.home')->with('data', $data);
    }

    function blog()
    {
        $blog = blog::all();

        $data = [
            'blog' => $blog
        ];

        return view('landing_page.blog.list')->with('data', $data);
    }

    function blog_detail($id_blog)
    {
        $data = blog::where('id_blog', $id_blog)->first();
        return view('landing_page.blog.detail')->with('data', $data);
    }
}
