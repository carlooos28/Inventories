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
				<td>{{$sale['product']['name']}}</td>
				<td>{{$sale['quantity']}}</td>        
				<td>{{$sale['product']['price']}}</td>
				<td>{{$sale['quantity'] * $sale['product']['price']}}</td>
				<td>{{$sale['status']}}</td>
				<td>{{$sale['created_at']}}</td>
				@if ($sale['status'] !== "canceled")
				<td>					
					<a href="{{action('SaleController@invoice', $sale['id'])}}" class="btn btn-success">
						Generate Invoice
					</a>					
				</td>
				<td>
					<form action="{{action('SaleController@update', $sale['id'])}}" method="post">
						{{csrf_field()}}
						{{ method_field('PATCH') }}						
						<input type="hidden" name="product_id" value={{$sale['product']['id']}}>
						<button class="btn btn-danger" type="submit">Cancel</button>
					</form>
				</td>
				@else
				<td>
				</td>
				<td>
				</td>				
				@endif				
			</tr>
			@endforeach
			</tbody>
		</table>

		@include('layouts.partials._errors')
		@include('layouts.partials._message')

		{{ $sales->links('vendor.pagination.bootstrap-4') }}

	</div>

@endsection