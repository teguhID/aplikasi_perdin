<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tr_invoice;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['invoice']);
    }

    function pilih_domain(Request $request)
    {
        $request->session()->put('domain', $request->domain);
        $request->session()->put('route', 'konfigurasi');

        return redirect()->route('konfigurasi');
    }

    public function konfigurasi()
    {
        return view('konfigurasi');
    }

    public function buat_invoice(Request $request)
    {

        try {
            $request = tr_invoice::create([
                "id_user" => Auth::user()->id,
                "total_harga" => $request->total_harga,
                "duration" => intval($request->duration),
                "domain" => $request->session()->get('domain'),
            ]);

            Session::flash('success', 'Pesanan Berhasil Dibuat');
        } catch (\Exception $error) {
            Session::flash('error', 'Pesanan Gagal Dibuat - ' . $error->getMessage());
        }

        return Redirect::route('invoice', ['id_invoice' => $request->id]);
    }

    public function invoice($id_invoice)
    {
        $data = tr_invoice::where('id_invoice', $id_invoice)->first();
        return view('invoice')->with('data', $data);
    }

    function print_invoice($id_invoice)
    {
        $data = tr_invoice::where('id_invoice', $id_invoice)->first();
        return view('print_invoice')->with('data', $data);
    }
}
