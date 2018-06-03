<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\DetailProduct;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sales $sale)
    {
        $sales = $sale::with('product')->with('supplier')->get();

        return view('sale.index', compact('sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validations
        $rules = [
            'product_id'  => 'required', 
            'quantity'    => 'required', 
            'lote'        => 'required',
            'expiration_date' => 'required',
            'price'           => 'required'
        ];

        $this->validate($request, $rules);
        
        // Id product
        $product_id = $request->get('product_id');

        // Update Price 
        $product = Product::findOrFail($product_id);
        $product->price = $request->price;
        $product->save();    

        // Insert Detail Product
        $data = $request->all();    
        $inventory = DetailProduct::create($data);

        // Update inventories 
        $inventory = Inventory::findOrFail($product_id);
        $inventory->quantity = $request->quantity + $inventory->quantity;
        $inventory->save();

        return redirect('/inventory');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $rules = [
            'product_id'  => 'required', 
            'quantity'    => 'required|numeric', 
            'price'       => 'required'
        ];

        $this->validate($request, $rules);        

        // Id product
        $product_id = $request->get('product_id');        

        $inventory = Inventory::findOrFail($product_id);

        if($inventory->availability > 0 && $request->quantity <= $inventory->availability ){

            $inventory->availability = $inventory->availability - $request->quantity;
            $inventory->save();
    
            return redirect('/inventory');        
        }

        return redirect('inventory')->with('status', 'there is no product availability!');

    }

    public function invoice($id)
    { 
        return view('sale.invoice', ['sales' => Sales::findOrFail($id)]);
    }    
}