<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Models\banner;
use App\Models\layanan;
use App\Models\profile;
use App\Models\contact;
use App\Models\portofolio;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function dashboard()
    {
        $data = [];
        return view('admin.dashboard')->with('data', $data);
    }

    // ========================= BANNER =========================
    function banner()
    {
        $data = banner::all();
        return view('admin.content.banner.list')->with('data', $data);
    }

    function banner_post(Request $request)
    {
        try {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/banner'), $imageName);

            $data = [
                'image_path' => 'banner/' . $imageName
            ];

            banner::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.banner');
    }

    function banner_delete(Request $request, $id_banner)
    {
        try {
            banner::where('id_banner', $id_banner)->delete();

            $image = public_path('img/' . $request->image);

            if (File::exists($image)) {
                File::delete($image);
            }
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.banner');
    }

    // ========================= LAYANAN =========================

    function layanan()
    {
        $data = layanan::all();
        return view('admin.content.layanan.list')->with('data', $data);
    }

    function layanan_detail()
    {
        return view('admin.content.layanan.detail');
    }

    function layanan_add_view()
    {
        return view('admin.content.layanan.add');
    }

    function layanan_post(Request $request)
    {
        try {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/layanan'), $imageName);

            $data = [
                'name' => $request->name,
                'desc' => $request->desc,
                'image_path' => 'layanan/' . $imageName
            ];

            layanan::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.layanan');
    }

    function layanan_edit_view($id_layanan)
    {
        $data = layanan::where('id_layanan', $id_layanan)->first();
        return view('admin.content.layanan.ubah')->with('data', $data);
    }

    function layanan_edit(Request $request, $id_layanan)
    {
        try {
            $data = [];
            $image = $request->file('image');

            if ($image) {

                $old_image = public_path('img/' . $request->old_image);

                if (File::exists($old_image)) {
                    File::delete($old_image);
                }

                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img/layanan'), $image_name);

                $data['image_path'] = 'layanan/' . $image_name;
            }

            $data['name'] = $request->name;
            $data['desc'] = $request->desc;

            layanan::where('id_layanan', $id_layanan)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.layanan');
    }

    function layanan_delete(Request $request, $id_layanan)
    {
        try {
            layanan::where('id_layanan', $id_layanan)->delete();

            $image = public_path('img/' . $request->image);

            if (File::exists($image)) {
                File::delete($image);
            }

            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.layanan');
    }

    // ========================= PROFILE =========================
    function profile()
    {
        $data = profile::get()->first();
        return view('admin.content.profile.list')->with('data', $data);
    }

    function profile_edit_view($id_profile)
    {
        $data = profile::where('id_profile', $id_profile)->first();
        return view('admin.content.profile.ubah')->with('data', $data);
    }

    function profile_edit(Request $request, $id_profile)
    {
        try {
            $data = [
                'judul' => $request->judul,
                'desc' => $request->desc,
            ];

            profile::where('id_profile', $id_profile)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.profile');
    }

    // ========================= PORTOFOLIO =========================
    function portofolio()
    {
        $data = portofolio::all();
        return view('admin.content.portofolio.list')->with('data', $data);
    }

    function portofolio_post(Request $request)
    {
        try {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/portofolio'), $imageName);

            $data = [
                'image_path' => 'portofolio/' . $imageName
            ];

            portofolio::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.portofolio');
    }

    function portofolio_delete(Request $request, $id_portofolio)
    {
        try {
            portofolio::where('id_portofolio', $id_portofolio)->delete();

            $image = public_path('img/' . $request->image);

            if (File::exists($image)) {
                File::delete($image);
            }
            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.portofolio');
    }

    // ========================= CONTACT =========================
    function contact()
    {
        $data = contact::all();
        return view('admin.content.contact.list')->with('data', $data);
    }

    function contact_edit_view()
    {
        $data = contact::all();
        return view('admin.content.contact.ubah')->with('data', $data);
    }

    function contact_edit(Request $request)
    {
        try {
            foreach ($request->except('_token') as $key => $value) {
                contact::where('name', $key)->update(['desc' => $value]);
            }
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.content.contact');
    }
}
