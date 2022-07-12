<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Barang;
class BarangController extends Controller
{
    public function index()
    {
        return view('dashboard',['data' => Barang::all()]);
    }

    public function createIndex()
    {
        return view('create');
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stok' => 'required|numeric',
            'status' => 'required',
        ],[
            'name.required' => 'Nama barang harus diisi',
            'stok.required' => 'Stok barang harus diisi',
            'stok.numeric' => 'Stok barang harus berupa angka',
            'status.required' => 'Status barang harus diisi',
        ]);

        Barang::create([
            'nama_barang' => $request->name,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    public function delete(Request $request)
    {
        $delete = Barang::find($request->id)->delete();
        return redirect()->back()->with('success','Data berhasil Dihapus');
    }

    public function editIndex($id)
    {
        $data = Barang::where('id',$id)->get();
        if($data == NULL){
            return abort(404);
        }
        return view('edit',['data' => $data]);
    }

    public function editPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stok' => 'required|numeric',
            'status' => 'required',
        ],[
            'name.required' => 'Nama barang harus diisi',
            'stok.required' => 'Stok barang harus diisi',
            'stok.numeric' => 'Stok barang harus berupa angka',
            'status.required' => 'Status barang harus diisi',
        ]);

        $data = Barang::where('id',$request->id)->update([
            'nama_barang' => $request->name,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success','Data berhasil diubah');
    }
}
