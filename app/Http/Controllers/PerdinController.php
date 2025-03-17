<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\tr_perdin;
use App\Models\m_pulau;

class PerdinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function perdin()
    {
        $data = tr_perdin::with(['kota_asal', 'kota_tujuan', 'pengaju', 'status'])->get();
        return view('admin.perdin.list')->with('data', $data);
    }

    function add_view()
    {
        $data['pulau'] = m_pulau::all();
        return view('admin.perdin.add')->with('data', $data);
    }

    function post(Request $request)
    {
        try {
            $data = [
                'id_kota_asal' => explode("|", $request->id_kota_asal)[0],
                'id_kota_tujuan' => explode("|", $request->id_kota_tujuan)[0],
                'id_user_pengaju' => Auth::user()->id,
                'id_status' => '1',
                'keterangan' => $request->keterangan,
                'date_berangkat' => $request->date_berangkat,
                'date_pulang' => $request->date_pulang,
                'durasi' => $request->durasi,
                'jarak' => $request->jarak,
                'mata_uang' => $request->mata_uang,
                'uang_saku' => $request->uang_saku,
                'total_uang_saku' => $request->total_uang_saku,
            ];

            tr_perdin::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.perdin');
    }
}
