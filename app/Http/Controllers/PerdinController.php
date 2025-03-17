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
        $data = tr_perdin::with(['kota_asal', 'kota_tujuan', 'pengaju', 'approval', 'status'])->orderBy('updated_at', 'DESC')->get();
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

    function edit_view($id_perdin)
    {
        $data['data'] = tr_perdin::where('id_perdin', $id_perdin)->with(['kota_asal', 'kota_tujuan', 'pengaju', 'status'])->first();
        $data['pulau'] = m_pulau::all();

        return view('admin.perdin.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_perdin)
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

            tr_perdin::where('id_perdin', $id_perdin)->update($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.perdin');
    }

    function update_status(Request $request, $id_perdin)
    {
        try {
            $data = [
                'id_status' => $request->id_status,
                'id_user_approval' => Auth::user()->id,
            ];

            tr_perdin::where('id_perdin', $id_perdin)->update($data);

            session()->flash('success', 'Data berhasil diperbarui');
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui.',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    function delete($id_perdin)
    {
        try {
            tr_perdin::where('id_perdin', $id_perdin)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.perdin');
    }
}
