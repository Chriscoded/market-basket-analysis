<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public function product()
	{
	    $product = Product::with('users','detail')->get();
	    $data = response()->json(
	    	[
	    		'message' => 'Data Sukses',
	    		'Product' => $product
	    	]);
	    print_r($data);
	}

	public function store(Request $request)
	{
	
	}
}
