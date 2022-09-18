<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payouts;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;


class PayoutController extends Controller
{
    public $product_id = [];
    public $qty = [];

    public function index()
    {
    	$data = Product::all();
        $payouts = Payouts::all();
    	// $json = response()->json($payouts);
    	// dd($json);
    	return view('administrator/payouts/payouts', compact('data','payouts'));
    }

    public function create()
    {
        $tests = Product::select('product_name','id')->get();
        return response()->json($tests);
    }

    public function store(Request $request)
    {
        $data = new Payouts;
        $data->no_transaksi = $request->no_transaction;
        $data->product_name1 = $request->product_name1;
        $data->product_name2 = $request->product_name2;
        $data->product_name3 = $request->product_name3;
        $data->product_name4 = $request->product_name4;
        $data->qty1 = $request->qty1;
        $data->qty2 = $request->qty2;
        $data->qty3 = $request->qty3;
        $data->qty4 = $request->qty4;
        $data->save();

        return redirect()->route('payouts.index');

        // dd($data);


        // // $tests = Product::select('product_name')->get();
        // // foreach($tests as $product){
            // $qty = $request->qty;
            // foreach($request->product_name as $i => $cek){
            //         $data[] = Payouts::create(array(
            //             'product_name' => $cek,
            //             'qty' => $qty[$i],
            //             'no_transaksi' =>$request->no_transaksi,
            //         ));
            //     }
        //     // }
        //     // $result = DB::table('payouts')->insert($data);
            // return redirect()->route('payouts.index');

        //     // dd($transaksi->payout_id = Auth::user()->id);

    }
}
