<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\m_provinsi;
use App\Models\m_pulau;

class ProvinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function list()
    {
        $data = m_provinsi::with('pulau')->get();
        return view('admin.master.provinsi.list')->with('data', $data);
    }

    function list_data($id_pulau)
    {
        $data = m_provinsi::where('id_pulau', $id_pulau)->get();
        return response()->json($data);
    }

    function add_view()
    {
        $data['pulau'] = m_pulau::all();
        return view('admin.master.provinsi.add')->with('data', $data);
    }

    function detail()
    {
        $data['pulau'] = m_pulau::all();
        return view('admin.master.provinsi.detail')->with('data', $data);
    }

    function post(Request $request)
    {
        try {
            $data = [
                'id_pulau' => $request->id_pulau,
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_provinsi::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.provinsi.list');
    }

    function edit_view($id_provinsi)
    {
        $data['pulau'] = m_pulau::all();
        $data['data'] = m_provinsi::where('id_provinsi', $id_provinsi)->first();

        return view('admin.master.provinsi.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_provinsi)
    {
        try {
            $data = [
                'id_pulau' => $request->id_pulau,
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_provinsi::where('id_provinsi', $id_provinsi)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.provinsi.list');
    }

    function delete($id_provinsi)
    {
        try {
            m_provinsi::where('id_provinsi', $id_provinsi)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.provinsi.list');
    }
}
