<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\m_kota;
use App\Models\m_provinsi;
use App\Models\m_pulau;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function list()
    {
        $data = m_kota::with('provinsi', 'pulau')->get();
        return view('admin.master.kota.list')->with('data', $data);
    }

    function list_data($id_provinsi)
    {
        $data = m_kota::where('id_provinsi', $id_provinsi)->get();
        return response()->json($data);
    }

    function add_view()
    {
        $data['pulau'] = m_pulau::all();
        return view('admin.master.kota.add')->with('data', $data);
    }

    function detail($id_kota)
    {
        return m_kota::where('id_kota', $id_kota)->with(['provinsi', 'pulau'])->first();
    }

    function post(Request $request)
    {
        try {

            $data = [
                'id_provinsi' => $request->id_provinsi,
                'id_pulau' => $request->id_pulau,
                'name' => $request->name,
                'is_luar_negri' => $request->is_luar_negri ? 1 : 0,
                'long' => $request->long,
                'lat' => $request->lat
            ];

            m_kota::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.kota.list');
    }

    function edit_view($id_kota)
    {
        $data['data'] = m_kota::where('id_kota', $id_kota)->first();
        $data['pulau'] = m_pulau::all();
        $data['provinsi'] = m_provinsi::where('id_pulau', $data['data']->id_pulau)->get();

        return view('admin.master.kota.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_kota)
    {
        try {
            $data = [
                'id_provinsi' => $request->id_provinsi,
                'id_pulau' => $request->id_pulau,
                'name' => $request->name,
                'is_luar_negri' => $request->is_luar_negri ? 1 : 0,
                'long' => $request->long,
                'lat' => $request->lat
            ];

            m_kota::where('id_kota', $id_kota)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.kota.list');
    }

    function delete($id_kota)
    {
        try {
            m_kota::where('id_kota', $id_kota)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.kota.list');
    }
}
