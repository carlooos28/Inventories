@extends('layouts.main')
@section('content')
<div class="container">
    
    <h1>Purchases - products</h1>
    <a href="{{url('/')}}" class="btn btn-info float-right"> Return Home</a>				
	<br><br><br>

    <form method="post" action="{{url('inventory', 0)}}">

        <div class="form-group row">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <label  class="col-2">Product</label>
            <div class="col-10">
                <select  name="product_id" onChange="changePrice(this)" class="form-control product_id" placeholder="Select product">
                    @foreach($products as $product)
                        <option value={{$product['id']}} data-price='{{$product['price']}}'>{{$product['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2">quantity</label>
            <div class="col-10">
                <input type="text" name="quantity" class="form-control quantity">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2">Price</label>
            <div class="col-10">
                <input type="text" name="price" value={{$products[0]['price']}} class="form-control price" readonly>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-success  float-right"> Save </button>
            </div>
        </div>        

    </form>

    @include('layouts.partials._errors')
    @include('layouts.partials._message')

@endsection

@section('script')
        let quantity = document.querySelector('.quantity'),
            products = document.querySelector('.product_id'),
            price    = document.querySelector('.price');

        function changePrice(products, paramQuantity = 0) {
            let priceProduct = products.options[products.selectedIndex].getAttribute('data-price');

                totalQuantity = (paramQuantity === 0) ? quantity.value : paramQuantity;

                return price.value   = parseInt(totalQuantity) * parseInt(priceProduct);
        }

        quantity.addEventListener('keyup', function (event) {
            let quantity = event.target.value;

                return changePrice(products, quantity);
        })

@endsection