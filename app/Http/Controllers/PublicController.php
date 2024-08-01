<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->nama_barang) {
            $barang = Barang::where('nama_barang', 'like', '%'.$request->nama_barang.'%')
                            ->orWhereHas('categories', function($q) use($request) {
                                $q->where('categories.id', $request->category);
                            })
                            ->get();
        }
        else {
            $barang = Barang::all();
        }

        return view('barang-list', ['barang' => $barang, 'categories' => $categories]);
    }
}
