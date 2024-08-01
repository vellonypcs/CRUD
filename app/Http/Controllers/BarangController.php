<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // untuk mengambil seluruh barang dari model barang
    public function index()
    {
        $barang = Barang::all();
        return view ('barang', ['barang' => $barang]);
    }

    // perintah untuk menambah data barang.
    public function add()
    {
        $categories = Category::all();
        return view('barang-add', ['categories' => $categories]);
    }

    // ini adalah perintah untuk menambah data barang, admin harus mengisi data barang dengan nama barang apa saja tetapi untuk kode barang harus unik. 
    public function store(Request $request)
    {
        $validate = $request->validate([
            'barang_code' => 'required|unique:barang|max:255',
            'nama_barang' => 'required|max:255',
        ]);

        $newName = '';
        if ($request->file('gambarbarang')) {
            $extension = $request->file('gambarbarang')->getClientOriginalExtension();
            $newName = $request->nama_barang.'-'.now()->timestamp.'.'.$extension;
            $request->file('gambarbarang')->storeAs('gambar', $newName);
        }

        $request['gambar'] = $newName;
        $barang = Barang::create($request->all());
        $barang->categories()->sync($request->categories);
        return redirect ('barang')->with('status', 'Barang Added Sucessfully');
    }

    // ini adalah perintah untuk mengedit data barang pada list barang.
    public function edit($slug) 
    {
        $barang = Barang::where('slug', $slug)->first();
        $categories = Category::all();

        return view('barang-edit', ['categories' => $categories, 'barang' => $barang]);
    }

    // ini adalah perintah untuk mengupdate / memperbarui / mengubah data barang (nama barang, gambar barang dan kategori barang) pada list barang.
    public function update(Request $request, $slug)
    {
        if($request->file('gambarbarang')) {
            $extension = $request->file('gambarbarang')->getClientOriginalExtension();
            $newName = $request->nama_barang.'-'.now()->timestamp.'.'.$extension;
            $request->file('gambarbarang')->storeAs('gambar', $newName);
            $request['gambar'] = $newName;
        }
        
        $barang = Barang::where('slug', $slug)->first();
        $barang->update($request->all());

        if($request->categories) {
            $barang->categories()->sync($request->categories);
        }

        return redirect('barang')->with('status', 'Barang Updated Successfully');
    }

    // ini adalah perintah untuk menghapus data barang 
    public function delete($slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        return view('barang-delete', ['barang' => $barang]);
    }

    // ini adalah perintah destroy, perintah ini digunakan ketika admin ingin menghapus data barang
    public function destroy($slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        $barang->delete();
        return redirect('barang')->with('status', 'Barang Deleted Successfully');
    }

    // ini adalah perintah ketika barang telah terhapus, data barang yang telah terhapus akan masuk ke list data barang yang terhapus
    public function deletedBarang()
    {
        $deletedBarang = Barang::onlyTrashed()->get();
        return view('barang-deleted-list', ['deletedBarang' => $deletedBarang]);
    }

    // ini adalah perintah ketika admin ingin mengembalikan suatu data barang yang telah terhapus
    public function restore($slug)
    {
        $barang = Barang::withTrashed()->where('slug', $slug)->first();
        $barang->restore();
        return redirect('barang')->with('status', 'Barang Restored Successfully');
    }
}
