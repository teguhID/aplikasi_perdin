<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Models\User;

class PerdinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ========================= LAYANAN =========================
    function user()
    {
        $data = User::all();
        return view('admin.user.list')->with('data', $data);
    }

    function edit_view($id)
    {
        $data = User::where('id', $id)->get()->first();
        return view('admin.user.ubah')->with('data', $data);
    }

    function user_edit(Request $request, $id)
    {
        try {
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'role' => 'user'
            ];

            if ($request->password != '') {
                $data['password'] = Hash::make($request->password);
            };

            User::where('id', $id)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.user');
    }
}
