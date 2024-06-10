<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Models\toko;

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function toko()
    {
        $data = toko::all();
        return view('admin.toko.list')->with('data', $data);
    }

    function toko_edit_view()
    {
        $data = toko::all();
        return view('admin.toko.ubah')->with('data', $data);
    }

    function toko_edit(Request $request)
    {
        try {

            foreach ($request->except('_token') as $key => $value) {
                $image = $request->file('image');

                if ($image && $key == 'image') {

                    $old_image = public_path('img/' . $request->old_image);

                    if (File::exists($old_image)) {
                        File::delete($old_image);
                    }

                    $image_name = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('img/toko'), $image_name);

                    $image_path = 'toko/' . $image_name;
                    toko::where('name', 'Icon')->update([
                        'desc' => $image_path
                    ]);
                }

                if ($key == 'Nama_Toko') {
                    toko::where('name', 'Nama Toko')->update([
                        'desc' => $value
                    ]);
                }
            }

            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.toko');
    }
}
