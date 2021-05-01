<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori = Categories::all();
        return view('view_kategori', compact('user', 'kategori'));
    }

    public function add_categories(Request $req)
    {
        $kategori = new Categories;

        $kategori->name = $req->get('name');
        $kategori->description = $req->get('description');

        $kategori->save();

        $notification = array(
            'message' => 'Tambah Kategori Berhasil',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kategori')->with($notification);
    }
    //proses ajax
    public function getDataCategories($id)
    {
        $kategori = Categories::find($id);

        return response()->jsonp($kategori);
    }

    public function update_categories(Request $req)
    {

        $kategori = Categories::find($req->get('id'));

        $kategori->name = $req->get('name');
        $kategori->description = $req->get('description');

        $kategori->save();

        $notification = array(
            'message' => 'Edit Data Kategori Sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kategori')->with($notification);
    }

    public function delete_categories(Request $req)
    {
        $kategori = Categories::find($req->get('id'));

        $kategori->delete();

        $notification = array(
            'message' => 'Hapus Data Kategori Sukses',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.kategori')->with($notification);
    }

}
