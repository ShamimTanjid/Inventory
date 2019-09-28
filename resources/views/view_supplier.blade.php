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
                        <div class="panel-heading"><h3 class="panel-title">view Employee</h3></div>
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
                                    <label for="exampleInputEmail1">Name</label>
                                     <p>{{ $view->name}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Email</label>
                                    <p>{{ $view->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Phone</label>
                                    <p>{{$view->phone}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword19">Address</label>
                                    <p>{{$view->address}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Shop Name</label>
                                   <p>{{$view->shop}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Account Holder</label>
                                    <p>{{$view->accountholder}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword41">Account Number</label>
                                    <p>{{$view->accountnumber}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Bank Name</label>
                                    <p>{{$view->bankname}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Branch Name</label>
                                    <p>{{$view->branchname}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword13">Supplier Type</label>
                                    <p>{{$view->type}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">City</label>
                                    <p>{{$view->city}}</p>
                                </div>
                                <div class="form-group">
                                	<img style="height:60px; width:50px;" src="{{URL::to($view->photo)}}"/>
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