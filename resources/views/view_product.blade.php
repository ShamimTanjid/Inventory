@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Echobvel</a></li>
                        <li class="active">IT</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">view Product</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                     <p>{{ $view->product_name}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Cat id</label>
                                    <p>{{ $view->cat_id }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Sup id</label>
                                    <p>{{$view->sup_id}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Product Code</label>
                                    <p>{{$view->product_code}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Product Garage</label>
                                   <p>{{$view->product_garage}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Category</label>
                                   <p>{{$view->cat_name}}</p>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword18">Supplier</label>
                                   <p>{{$view->name}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Product route</label>
                                    <p>{{$view->product_route}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Buy Date</label>
                                    <p>{{$view->buy_date}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Expire Date</label>
                                    <p>{{$view->expire_date}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Buying Price</label>
                                    <p>{{$view->buying_price}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Selling Price</label>
                                    <p>{{$view->selling_price}}</p>
                                </div>
                                
                                <div class="form-group">
                                	<img style="height:60px; width:50px;" src="{{URL::to($view->product_imgage)}}"/>
                                    <label for="exampleInputPassword11">Photo</label>
                                    
                                </div>
                              
                               
                            
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>


@endsection