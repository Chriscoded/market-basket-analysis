<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Payouts;

class HomeController extends Controller
{
    public function index()
    {
        $member = User::count();
        $barang = Product::count();
        $transaction = Payouts::count();
    	return view('administrator/home', compact('member','barang','transaction'));
    }
    public function member()
    {
    	return view('member/home');
    }
}
