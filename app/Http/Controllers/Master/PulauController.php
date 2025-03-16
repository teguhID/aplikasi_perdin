<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\m_pulau;

class PulauController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function list()
    {
        $data = m_pulau::all();
        return view('admin.master.pulau.list')->with('data', $data);
    }

    function add_view()
    {
        return view('admin.master.pulau.add');
    }

    function detail()
    {
        return view('admin.master.pulau.detail');
    }

    function post(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_pulau::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.pulau.list');
    }

    function edit_view($id_pulau)
    {
        $data = m_pulau::where('id_pulau', $id_pulau)->first();
        return view('admin.master.pulau.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_pulau)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_pulau::where('id_pulau', $id_pulau)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.pulau.list');
    }

    function delete($id_pulau)
    {
        try {
            m_pulau::where('id_pulau', $id_pulau)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.pulau.list');
    }
}
