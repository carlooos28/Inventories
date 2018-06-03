@extends('layouts.main')
@section('content')
	<div class="container">

		<h1>Supplier - products</h1>

		<a href="{{url('/')}}" class="btn btn-info float-right"> Return Home</a>		
		<br><br> 

		<form method="post" action="{{url('inventory')}}">

			<div class="form-group row">
				{{csrf_field()}}
				<label  class="col-2 ">Supplier</label>
				<div class="col-10">
					<select class="form-control " placeholder="Select supplier" name="supplier_id">
						@foreach($suppliers as $supplier)
							<option value={{$supplier['id']}}>{{$supplier['name']}}</option>
						@endforeach          
					</select>
				</div>
			</div>

			<div class="form-group row">
				{{csrf_field()}}
				<label  class="col-2 ">Product</label>
				<div class="col-10">
					<select class="form-control " onChange="changePrice(this)" placeholder="Select product" name="product_id">
						@foreach($products as $product)
						<option value={{$product['id']}} data-price='{{$product['price']}}'>{{$product['name']}}</option>
						@endforeach          
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 ">quantity</label>
				<div class="col-10">
					<input type="text" name="quantity" class="form-control ">
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 ">Lote</label>
				<div class="col-10">
					<input type="text" name="lote" class="form-control ">
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 ">Expiration Date</label>
				<div class="col-10">
					<input type="date" name="expiration_date" class="form-control ">
				</div>
			</div>

			<div class="form-group row">
				<label  class="col-2 ">Unit Price</label>
				<div class="col-10">
					<input type="text" name="price" class="form-control price" value={{$products[0]['price']}} disabled>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-success  float-right"> Save </button>
					<br><br>
				</div>
			</div>			

		</form>

		@include('layouts.partials._errors')

	</div>

@endsection

@section('script')
	let price    = document.querySelector('.price');
		
	function changePrice(product) {
		let priceProduct = product.options[product.selectedIndex].getAttribute('data-price');
			return price.value  = priceProduct;
	}

@endsection