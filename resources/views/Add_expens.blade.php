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
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Expense
                          <a href="{{route('Today.expense')}}" class="btn btn-sm btn-danger pull-right">Today</a>
                          <a href="{{ route('Monthly.expense') }}" class="btn btn-sm btn-info pull-right">This Month</a>
                          </h3>
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
                        <div class="panel-body">
                            <form role="form" action="{{ url('/insert-expense') }}" method="post" >
                                @csrf
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Expens details</label>
                                    <textarea   class="form-control"  rows="5" name="details"></textarea>
                                    
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword20">Total Ammount</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Total Ammount" required>
                                </div>
                                <div class="form-group">
                                    
                                  <input type="hidden" class="form-control" name="month" value="{{date("F")}}">
                                  <input type="hidden" class="form-control" name="year" value="{{date("Y")}}">
                                </div>
                                <div class="form-group">
                                   
                                    <input type="hidden" class="form-control" name="date" value="{{date("d/m/y")}}">
                                </div>

                                
                              
                                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>

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