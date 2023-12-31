<?php

namespace App\Http\Controllers\ProductsManagement;

use App\Http\Controllers\Controller;
use App\Models\ProductsManagement\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response([
            'message' => 'Retrieved successfully',
            'products' => $products
        ], 200);
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
        // create product
        // validate request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $product = Product::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status??'active',
                    'created_by' => $request->user_id?? 1,
                    'updated_by' => $request->user_id?? null
                ]);
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                // update product
                // validate request
                $request->validate([
                    'name' => 'required',
                    'description' => 'required',
                ]);
                $product = Product::find($id);
                $product->name = $request->name;
                $product->description = $request->description;
                $product->status = $request->status??'active';
                $product->updated_by = $request->user_id?? null;
                $product->save();
                return response()->json([
                    'message' => 'Product updated successfully',
                    'product' => $product,
                ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
