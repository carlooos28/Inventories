<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Inventory;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sales $sale)
    {
        $sales = $sale::with('product')->orderBy('id', 'desc')->paginate(5);

        return view('sale.index', compact('sales'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sale.invoice', ['sales' => Sales::findOrFail($id)]);
    }

    public function invoice($id)
    { 
        return view('sale.invoice', ['sales' => Sales::findOrFail($id)]);
    }    

    public function update(Request $request, $id)
    {
        // Validations
        $rules = [
            'product_id' => 'required'
        ];

        $this->validate($request, $rules);
        
        // Id product
        $product_id = $request->get('product_id');        
        
        // Update status of the Sale to cancel
        $sale = Sales::findOrFail($id);
        $sale->status = "canceled";
        $sale->save();        

        // Update the availability of inventories 
        $inventory = Inventory::findOrFail($product_id);
        $inventory->availability = $sale->quantity + $inventory->availability;
        $inventory->save();        

        return redirect('sales')->with('status', 'Canceled Sale!');
    }    
}