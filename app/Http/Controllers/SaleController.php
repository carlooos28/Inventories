<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sales $sale)
    {
        $sales = $sale::with('product')->get();

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
}