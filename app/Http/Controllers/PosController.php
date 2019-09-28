<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;

class PosController extends Controller
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

    public function Index(){

    	$product=DB::table('products')
    	->join('categories','products.cat_id','categories.id')
    	->select('categories.cat_name','products.*')
    	->get();
    	$customer=DB::table('customers')->get();
        $categories=DB::table('categories')->get();
    	return view('pos',compact('product','customer','categories'));
    }
    public function Pendingorder(){
        $pending=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')->where('order_status','pending')->get();

                return view('pending_order',compact('pending'));

    }


    public function ViewOrderStatus($id){
        // print_r($id);
           $order=DB::table('orders')
               ->join('customers','orders.customer_id','customers.id')
               ->select('customers.*','orders.*')
               ->where('orders.id',$id)
               ->first();

               //print_r($order);

              

          $order_details=DB::table('orderdetails')
           ->join('products','orderdetails.product_id','products.id')
            ->select('orderdetails.*','products.product_name','products.product_code') 
            ->where('order_id',$id) 
            ->get(); 
            // print_r($order_details);
            return view('order-conformation',compact('order','order_details'));
    }
   

     public function PosDone($id)
     {
      $approved=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']); 
     

     if ($approved)
             { 
                $notification=array( 
                    'messege'=>'Successfully Invoice Created | Please delever the products and accept status', 
                'alert-type'=>'success' 
            ); 
             return Redirect()->route('pending.order')->with($notification); 
        }else{
         $notification=array( 
            'messege'=>'error exeption!', 
            'alert-type'=>'success' ); 
             return Redirect()->back()->with($notification); 
        }
     }
     public function successorder(){
         $success=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')->where('order_status','success')->get();

                return view('success_order',compact('success'));
            
          }
 }
