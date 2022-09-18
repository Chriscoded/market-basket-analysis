<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Product::all();
        // return response()->json($barang);
        return view('administrator/barang/barang',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $imageName = time().'.'.$request->foto->extension();
        // $foto = $request->foto->move(public_path('image'), $imageName);

        $product = new Product;
        $product->users_id = $request->users_id;
        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->jenis = $request->jenis;
        $product->bv = $request->bv;
        $product->save();

        $detail = new ProductDetail;
        $detail->harga = $request->harga;
        $product->detail()->save($detail);

        // Product::create(
        // [
        //     'users_id' => $request->users_id,
        //     'product_name' => $request->product_name,
        //     'qty' => $request->qty,
        //     'jenis' => $request->jenis,
        //     'bv' => $request->bv,
        //     'harga' => $request->harga,
        //     'foto' => $request->foto->move(public_path('image'), $imageName)
        // ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = ProductDetail::find($id); 
        $product = Product::find($id);
        return response()->json([
            'detail' => $detail,
            'product' => $product
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::query()->where('id', $request->id)->update([
            'users_id' => $request->users_id,
            'product_name' => $request->nama_product,
            'qty' => $request->qty,
            'jenis' => $request->jenis,
            'bv' => $request->bv,
        ]);

        $detail = ProductDetail::query()->where('id', $request->id)->update([
            'product_id' => $request->product_id,
            'harga' => $request->harga,
        ]);

        // $update->update($request->all());
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = ProductDetail::find($id); 
        $product = Product::find($id);
        $detail->delete();
        $product->delete();
        return redirect()->route('barang.index');
    }
}
