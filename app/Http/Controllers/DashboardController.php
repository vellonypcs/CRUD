<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\User;
use App\Models\RentLogs;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rentlog = RentLogs::with('user', 'barang')->get();
        $barangCount = Barang::count();
        $categoryCount = Category::count();
        // $rentlogCount = RentLogs::count();
        $userCount = User::count();
        return view('dashboard', ['rent_logs' => $rentlog, 'barang_count' => $barangCount, 'category_count' => $categoryCount, 'user_count' => $userCount]);
    }
    
}
