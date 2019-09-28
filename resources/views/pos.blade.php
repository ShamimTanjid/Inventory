@extends('layouts.app')

@section('content')
 <div class="content-page">
 <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12 bg-info">
                                <h4 class="pull-left page-title text-white">POS(Point of sale)</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#" class="text-white">Echovel</a></li>
                                    <li class="text-white">{{date('d/m/y')}}</li>
                                </ol>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <form method="post" action="{{url('/create-invoice')}}">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="portfolioFilter">
                                  @foreach($categories as $row)
                                    <a href="#" data-filter="*" class="current">{{$row->cat_name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                  <br>
             <div class="row">
             	<div class="col-lg-6">
                     
                      <div class="price_card text-center">
                                        
                        <ul class="price-features" style="border:1px solid grey;">
                        <table class="table">
                        <thead class="bg-info">
                          <tr>
                            <th class="text-white">Name</th>
                            <th class="text-white">Qty</th>
                            <th class="text-white">single price</th>
                            <th class="text-white">Sub Total</th>
                            <th class="text-white">Action</th>
                          </tr>
                        </thead>
                        @php
                        $cart=Cart::content()
                        @endphp
                        <tbody>
                          @foreach($cart as $crtrow)
                          <tr>
                           <th>{{ $crtrow->name}}</th> 
                           <form action="{{url('/cart-update/'.$crtrow->rowId)}}" method="post">
                           @csrf
                           <th>
                            <input type="Number" name="qty" value="{{ $crtrow->qty}}" style="width: 40px">
                            <button type="submit" name="submit" class="btn btn-sm btn btn-success" style="margin-top: -2px"><i class="fas fa-check"></i></button> 
                           </th>
                           </form>
                           <th>{{ $crtrow->price}}</th>
                            <th>{{ $crtrow->price* $crtrow->qty}}</th>
                           <th><a href="{{url('/cart-remove/'.$crtrow->rowId)}}"><i class="fas fa-trash-alt  text-danger"></i></a></th>
                          </tr>
                          @endforeach
                      </tbody>
                      </table>
                        </ul>
                      <div class="pricing-header bg-primary">
                                 <p style="font-size: 19px;">Quality:{{Cart::count()}}</p>
                                  <p style="font-size: 19px;">Sub total:{{Cart::subtotal()}}</p>
                                           
                                 <p style="font-size: 19px;">Vat:{{Cart::tax()}}</p>
                                    <hr>
                           <p><h2 class="text-white">Total:</h2> <h1 class="text-white">{{Cart::total()}}</h1>
                           </p>

                          
                           <form method="post" action="{{url('/create-invoice')}}">
                            @csrf
                             <div class="panel"><br><br>
                                @if ($errors->any())
             <div class="alert alert-danger">
               <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
              </ul>
                </div>
              @endif`````
                        <h4 class="text-info">Select Customer
                          <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                        </h4>
                          @php 
                            $customer=DB::table('customers')->get();
                          @endphp
                        <select class="form-control" name="cus_id">
                          <option disabled="" selected="">select customer</option>
                          @foreach($customer as $cus)
                          <option value="{{$cus->id}}">{{$cus->name}}</option>
                          @endforeach
                        </select>
                     </div> 
                            
                    </div>
                   <button type="submit" class="btn btn-success"> Create Invoice</button>
                </div> 
                   
                </div>

        </form>

             	<div class="col-lg-6">
             	<table id="datatable" class="table table-striped table-bordered">
                                      <thead>
                                          <tr>
                                          	 <th>Image</th>
                                              <th>Name</th>
                                              <th>Category</th>
                                              <th>Product</th>
                                              <th>Add</th>
                                          </tr>
                                      </thead>

                               
                                      <tbody>
                                        @foreach($product as $row)
                                          <tr>
                                            <form method="post" action="{{url('/add-cart')}}" >
                                              @csrf
                                              <input type="hidden" name="id" value="{{$row->id}}">
                                              <input type="hidden" name="name" value="{{$row->product_name}}">
                                              <input type="hidden" name="qty" value="1">
                                             <input type="hidden" name="price" value="{{$row->selling_price}}">
                                             <input type="hidden" name="weight" value="{{$row->product_code}}">
                                          	<td>
                                              {{--<a href="#" style="font-size: 20px"><i class="fas fa-plus-circle"></i></a>--}}
                                              <img src="{{URL::to($row->product_imgage)}}" width="60px" height="50px">
                                            </td>
                                             <td>{{ $row->product_code }}</td>
                                              <td>{{ $row->cat_name }}</td>
                                              <td>{{ $row->product_code }}</td>
                                             <td><button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i></button></td>
                                             </form>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                                  </div>
                                </div>   
                              </div> <!-- container -->
                               </div> <!-- content -->
                             </div>

<!--...cutomer and modal.....--->
<form action="{{ url('/insert-customer') }}" method="post" enctype="multipart/form-data">
  @csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add a New Customer</h4> 
            </div> 
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                  <div class="modal-body">             
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Name</label> 
                            <input type="text" class="form-control" id="field-4" name="name" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Email</label> 
                            <input type="email" class="form-control" id="field-5" name="email" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Phone</label> 
                            <input type="text" class="form-control" id="field-6" name="phone" required=""> 
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Address</label> 
                            <input type="text" class="form-control" id="field-4" name="address" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Shopname</label> 
                            <input type="text" class="form-control" id="field-5" name="shopname" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">City</label> 
                            <input type="text" class="form-control" id="field-6" name="city" required=""> 
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Account Number</label> 
                            <input type="text" class="form-control" id="field-4" name="account_number" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Account Holder</label> 
                            <input type="text" class="form-control" id="field-5" name="account_holder" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Bank Name</label> 
                            <input type="text" class="form-control" id="field-6" name="bank_name" required=""> 
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Bank Branch</label> 
                            <input type="text" class="form-control" id="field-4" name="bank_branch" required=""> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                           <img id="image" src="#" />
                            <label for="exampleInputPassword11">Photo</label>
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Photo</label> 
                            <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                        </div> 
                                  </div>  
              
            </div> 
                <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
            </div> 
          </div>                  
       </div>
     </div><!-- /.modal -->
   </form>
   <script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
