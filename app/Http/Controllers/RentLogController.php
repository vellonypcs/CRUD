<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with(['user', 'barang'])->get();
        return view('rentlog', ['rent_logs' => $rentlogs]);
    }
}
