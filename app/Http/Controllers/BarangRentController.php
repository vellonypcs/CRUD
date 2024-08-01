<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\RentLogs;
use App\Models\User;
use App\Models\Barang;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BarangRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $barang = Barang::all();
        return view('barang-rent', ['users' => $users, 'barang' => $barang]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        $barang = Barang::findOrFail($request->barang_id)->only('status');

        if($barang['status'] != 'tersedia') {
            Session::flash('message', 'Tidak bisa meminjam, barang tidak tersedia!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('barang-rent');
        }
        else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if($count >= 3) {
                Session::flash('message', 'Tidak bisa meminjam, telah mencapai batas meminjam!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('barang-rent');
            }
            else {
                try {
                    DB::beginTransaction();
                    //process insert to rent_logs table
                    RentLogs::create($request->all());
                    //process update barang table
                    $barang = Barang::findOrFail($request->barang_id);
                    $barang->status = 'tidak tersedia';
                    $barang->save();
                    DB::commit();
    
                Session::flash('message', 'Peminjaman Sukses!!!');
                Session::flash('alert-class', 'alert-success');
                return redirect('barang-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBarang()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $barang = Barang::all();
        return view('return-barang', ['users' => $users, 'barang' => $barang]);
    }

    public function saveReturnBarang(Request $request)
    {
        // user & barang yang dipilih untuk direturn benar, maka berhasil return barang
        // jika user & barang yang dipilih untuk return salah, maka muncul error message
        $rent = RentLogs::where('user_id', $request->user_id)->where('barang_id', $request->barang_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
        
        if($countData == 1) {
            // kita akan return barang
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'Barang telah berhasil di kembalikan!');
            Session::flash('alert-class', 'alert-success');
            return redirect('barang-return');
        }
        else {
            // error message muncul
            Session::flash('message', 'Terjadi error dalam pengembalian barang!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('barang-return');
        }
    }
}