@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center" >
                        <a href="{{url('/supplier')}}"> 
                            <div class="card-body">                                                            
                                Supplier
                            </div>
                        </a>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="card text-center" >
                        <a href="{{url('/inventory')}}"> 
                            <div class="card-body">                                                            
                                Inventory
                            </div>
                        </a>
                    </div>                    
                </div>  
            </div>    
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center" >
                        <a href="{{url('/product')}}"> 
                            <div class="card-body">                                                            
                                Product
                            </div>
                        </a>
                    </div>                    
                </div>
            <div class="col-md-6">
                <div class="card text-center" >
                    <a href="{{url('/sales')}}"> 
                        <div class="card-body">                                                            
                            Sales
                        </div>
                    </a>
                </div>                    
            </div>                
        </div>    
    </div>
@endsection