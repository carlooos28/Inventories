@extends('layouts.main')
@section('content')
	<div class="container">
		<h1>Inventory - products</h1>
		<a href="{{url('/')}}" class="btn btn-info float-right"> Return Home</a>				
		<br><br><br>
		<table class="table table-striped">
			<thead>
				<tr>
				<th>ID</th>
				<th>Supplier</th>
				<th>Product</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Availability</th>
				</tr>
			</thead>
			<tbody> 
				@foreach($inventories as $inventory)
					<tr>
						<td>{{$inventory['id']}}</td>        
						<td>{{$inventory['supplier'][0]['name']}}</td>        
						<td>{{$inventory['product']['name']}}</td>
						<td>{{$inventory['product']['price']}}</td>
						<td>{{$inventory['quantity']}}</td>        
						<td>{{$inventory['availability']}}</td>        
					</tr>
				@endforeach
			</tbody>
		</table>
		@if (session('status'))
			<div class="alert alert-info">
				{{ session('status') }}
			</div>
		@endif  		
	</div>

@endsection