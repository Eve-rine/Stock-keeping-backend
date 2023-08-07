<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Stock\Stockmovement;
use Illuminate\Http\Request;

class StockmovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockmovements = Stockmovement::with('product')
            ->paginate($request->per_page ?? 20);
        return response()->json([
            'message' => 'Retrieved successfully',
            'stockmovements' => $stockmovements
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
    // create stockmovement
            // validate request
            $request->validate([
                'product_id' => 'required',
                'qty' => 'required',
                'transaction_type' => 'required',
            ]);
            $stockmovement = Stockmovement::create([
                        'product_id' => $request->product_id,
                        'qty' => $request->quantity,
                        'transaction_type' => $request->transaction_type,
                        'created_by' => $request->user_id?? 1,
                        'updated_by' => $request->user_id?? null
                    ]);
            return response()->json([
                'message' => 'Stockmovement created successfully',
                'stockmovement' => $stockmovement,
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
        //
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
