@extends('layouts.main')
@section('content')
	<div class="container">
		<h1>Invoice - Product - {{$sales['product']['name']}} </h1>
		<a href="{{url('sales')}}" class="btn btn-info float-right"> Return To Sales</a>		
		<br><br><br> 
		<table class="table table-striped">
			<tbody>
				<tr>
					<th>ID</th>
					<td>{{$sales['id']}}</td>
				</tr>  
				<tr>
					<th>Product</th>
					<td>{{$sales['product']['name']}}</td>
				</tr>  
				<tr>        
					<th>Quantity</th>
					<td>{{$sales['quantity']}}</td>        
				</tr>  
				<tr>           
					<th>Unit Price</th>
					<td>{{$sales['product']['price']}}</td>
				</tr>  
				<tr>                   
					<th>Total Price</th>
					<td>{{$sales['quantity'] * $sales['product']['price']}}</td>        
				</tr>  
				<tr>        
					<th>Status</th>
					<td>{{$sales['status']}}</td>        
				</tr>  
				<tr>           
					<th>Date Sales</th>
					<td>{{$sales['created_at']}}</td>                
				</tr>  
			</tbody>     
		</table>
	</div>
@endsection