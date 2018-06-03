<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Product;
use App\DetailProduct;
use App\Sales;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Inventory $inventory)
    {
        $inventories = $inventory::with('product')->get();

        return view('inventory.index', compact('inventories'));
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
            'supplier_id'     => 'required', 
            'product_id'      => 'required', 
            'quantity'        => 'required', 
            'lote'            => 'required',
            'expiration_date' => 'required'
        ];

        $this->validate($request, $rules);
        
        // Id product
        $product_id = $request->get('product_id');

        // Insert Detail Product
        $data = $request->all();    
        $inventory = DetailProduct::create($data);

        // Update inventories 
        $inventory = Inventory::findOrFail($product_id);
        $inventory->quantity     = $request->quantity + $inventory->quantity;
        $inventory->availability = $request->quantity + $inventory->availability;
        $inventory->save();

        return redirect('/inventory');
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
            'quantity'    => 'required|numeric'
        ];

        $this->validate($request, $rules);        

        // Id product
        $product_id = $request->get('product_id');        

        $inventory = Inventory::findOrFail($product_id);

        if($inventory->availability > 0 && $request->quantity <= $inventory->availability ){

            // Insert Sale
            $dataSale = $request->all();    
            $dataSale["status"] = "sold";
            $sale = Sales::create($dataSale);

            $inventory->availability = $inventory->availability - $request->quantity;
            $inventory->save();
    
            return redirect('sales');        
        }

        return redirect('product')->with('status', 'There is no product availability!');

    }
    
}
