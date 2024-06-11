<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Models\banner;
use App\Models\choose_us;
use App\Models\blog;
use App\Models\profile;
use App\Models\contact;
use App\Models\portofolio;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ========================= LAYANAN =========================
    function blog()
    {
        $data = blog::all();
        return view('admin.blog.list')->with('data', $data);
    }

    function blog_detail()
    {
        return view('admin.blog.detail');
    }

    function blog_add_view()
    {
        return view('admin.blog.add');
    }

    function blog_post(Request $request)
    {
        try {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/blog'), $imageName);

            $data = [
                'judul' => $request->judul,
                'desc' => $request->desc,
                'image_path' => 'blog/' . $imageName
            ];

            blog::create($data);
            session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.blog');
    }

    function blog_edit_view($id_blog)
    {
        $data = blog::where('id_blog', $id_blog)->first();
        return view('admin.blog.ubah')->with('data', $data);
    }

    function blog_edit(Request $request, $id_blog)
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
                $image->move(public_path('img/blog'), $image_name);

                $data['image_path'] = 'blog/' . $image_name;
            }

            $data['judul'] = $request->judul;
            $data['desc'] = $request->desc;

            blog::where('id_blog', $id_blog)->update($data);
            session()->flash('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.blog');
    }

    function blog_delete(Request $request, $id_blog)
    {
        try {
            blog::where('id_blog', $id_blog)->delete();

            $image = public_path('img/' . $request->image);

            if (File::exists($image)) {
                File::delete($image);
            }

            session()->flash('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.blog');
    }
}
