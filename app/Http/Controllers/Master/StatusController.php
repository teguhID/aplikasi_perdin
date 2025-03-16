<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\m_status;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function list()
    {
        $data = m_status::all();
        return view('admin.master.status.list')->with('data', $data);
    }

    function add_view()
    {
        return view('admin.master.status.add');
    }

    function detail()
    {
        return view('admin.master.status.detail');
    }

    function post(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_status::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.status.list');
    }

    function edit_view($id_status)
    {
        $data = m_status::where('id_status', $id_status)->first();
        return view('admin.master.status.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_status)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_status::where('id_status', $id_status)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.status.list');
    }

    function delete($id_status)
    {
        try {
            m_status::where('id_status', $id_status)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.status.list');
    }
}
