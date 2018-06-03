@extends('layouts.main')
@section('content')
	<div class="container">
		<h1>Sales - Products</h1>
		<a href="{{url('/')}}" class="btn btn-info float-right"> Return Home</a>		
		<br><br><br> 
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Supplier</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Total Price</th>
					<th>Status</th>
					<th>Date Sales</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody> 
			@foreach($sales as $sale)
			<tr>
				<td>{{$sale['id']}}</td>        
				<td>{{$sale['supplier'][0]['name']}}</td>        
				<td>{{$sale['product']['name']}}</td>
				<td>{{$sale['quantity']}}</td>        
				<td>{{$sale['product']['price']}}</td>
				<td>{{$sale['quantity'] * $sale['product']['price']}}</td>
				<td>{{$sale['status']}}</td>
				<td>{{$sale['created_at']}}</td>
				<td>
					<a href="{{action('SaleController@invoice', $sale['id'])}}" class="btn btn-success">
						Generate Invoice
					</a>
				</td>
				<td>
					<form action="{{action('SaleController@invoice', $sale['id'])}}" method="post">
						{{csrf_field()}}
						<input name="_method" type="hidden" value="DELETE">
						<button class="btn btn-danger" type="submit">Cancel</button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>

	@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
	@endif

@endsection