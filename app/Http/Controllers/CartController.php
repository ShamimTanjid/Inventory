<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
    	 
    	$data=array();
    	$data['id']=$request->id;
    	$data['name']=$request->name;
    	$data['qty']=$request->qty;
    	$data['price']=$request->price;
    	$data['weight']=$request->weight;
    	$add=Cart::add($data);
    	 if($add) {
                 $notification=array(
                 'messege'=>'Product Added ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    

    }

  public function cartUpdate(Request $request,$rowId){

  	$qty=$request->qty;
  	$update=Cart::update($rowId,$qty);

  	if($update) {
                 $notification=array(
                 'messege'=>'Product Added ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    

  }
    public function cartRemove($rowId){

         $remove=Cart::remove($rowId);
         if($remove) {
                 $notification=array(
                 'messege'=>'Product Added ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    
    } 


    public function createinvoice(Request $request){
    	$request->validate([
        'cus_id' => 'required',
        ],
        [
            'cus_id.required' => 'Select A Customer First !',
        ]);
        $cus_id=$request->cus_id;
        $customer=DB::table('customers')->where('id',$cus_id)->first();
        $contents=Cart::content();
    	return view('invoice',compact('customer','contents'));
    }
    public function finalinvoice(Request $request){

    	 $data=array();
      $data['customer_id']=$request->customer_id;
      $data['order_date']=$request->order_date;
      $data['order_status']=$request->order_status;
      $data['total_products']=$request->total_products;
      $data['sub_total']=$request->sub_total;
      $data['vat']=$request->vat;
      $data['total']=$request->total;
      $data['payment_status']=$request->payment_status;
      $data['pay']=$request->pay;
      $data['due']=$request->due;


      $order_id=DB::table('orders')->insertGetId($data);
      $contents=Cart::content();
      $odata=array();
      foreach ($contents as $content) {
         $odata['order_id']=$order_id;
         $odata['product_id']=$content->id; 
         $odata['quantity']=$content->qty;
         $odata['unitcost']=$content->price;
         $odata['total']=$content->total;



        $insert=DB::table('orderdetails')->insert($odata);
    }
     if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully Invoice Created | Please delever the products and accept status',
                 'alert-type'=>'success'
                  );
                 Cart::destroy();
                return Redirect()->route('pending.order')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error exeption!',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
         }
          
}
