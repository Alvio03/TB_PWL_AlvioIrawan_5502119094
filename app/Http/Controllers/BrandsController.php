<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $merek = Brands::all();
        return view('view_brands', compact('user', 'merek'));
    }

    public function add_brand(Request $req)
    {
        $merek = new Brands;

        $merek->name = $req->get('name');
        $merek->description = $req->get('description');

        $merek->save();

        $notification = array(
            'message' => 'Data Brand Ditambahkan',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.merek')->with($notification);
    }
    //Ajax Processes
    public function getDataBrands($id)
    {
        $merek = Brands::find($id);

        return response()->json($merek);
    }

    public function update_brands(Request $req)
    {
        $merek = Brands::find($req->get('id'));

        $merek->name = $req->get('name');
        $merek->description = $req->get('description');

        $merek->save();

        $notification = array(
            'message' => 'Data Brand Berhasil di Edit',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.merek')->with($notification);
    }
    public function delete_brands(Request $req)
    {
        $merek = Brands::find($req->get('id'));

        $merek->delete();
        $notification = array(
            'message' => 'Data Brand Berhasil di Hapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.merek')->with($notification);
    }
}
