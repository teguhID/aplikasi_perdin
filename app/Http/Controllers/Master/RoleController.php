<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\m_role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function list()
    {
        $data = m_role::all();
        return view('admin.master.role.list')->with('data', $data);
    }

    function add_view()
    {
        return view('admin.master.role.add');
    }

    function detail()
    {
        return view('admin.master.role.detail');
    }

    function post(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_role::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.role.list');
    }

    function edit_view($id_role)
    {
        $data = m_role::where('id_role', $id_role)->first();
        return view('admin.master.role.ubah')->with('data', $data);
    }

    function edit(Request $request, $id_role)
    {
        try {
            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
            ];

            m_role::where('id_role', $id_role)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.role.list');
    }

    function delete($id_role)
    {
        try {
            m_role::where('id_role', $id_role)->delete();
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.master.role.list');
    }
}
