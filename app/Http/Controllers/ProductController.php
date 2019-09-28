<?php

namespace App\Http\Controllers;
use DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;

class ProductController extends Controller
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

    public function Addproduct(){

   
     return view('add_product');
    }
    public function Productstore(Request $request){
    

    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['cat_id']=$request->cat_id;
    	$data['sup_id']=$request->sup_id;
    	$data['product_code']=$request->product_code;
    	$data['product_route']=$request->product_route;
    	$data['product_garage']=$request->product_garage;
    	$data['buy_date']=$request->buy_date;
    	$data['expire_date']=$request->expire_date;
    	$data['buying_price']=$request->buying_price;
    	$data['selling_price']=$request->selling_price;
         $image=$request->file('product_imgage');

    	 if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_imgage']=$image_url;
                $employee=DB::table('products')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
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
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }

    }

    public function AllProduct(){
       $product=DB::table('products')->get();
    	return view('all_product',compact('product'));
    }


    public function DeleteProduct($id){
        $delete=DB::table('products')->where('id',$id)->first();
           $photo=$delete->product_imgage;
           unlink($photo);
           $dltproduct=DB::table('products')
                  ->where('id',$id)
                  ->delete();;
        
         if($dltproduct){
                 $notification=array(
                 'messege'=>'Successfully Advanced Paid ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      

    }
    public function Viewproduct($id){
             $view=DB::table('products')
               ->join('categories','products.cat_id','categories.id')
               ->join('suppliers','products.sup_id','suppliers.id')
               ->select('products.*','categories.cat_name','suppliers.name')
               ->where('products.id',$id)
               ->first();


               return view('view_product',compact('view'));
}

public function Editproduct($id)
    {
        $edit=DB::table('products')->where('id',$id)->first();


       return view ('edit_product',compact('edit'));
}
public function updateproduct(Request $request,$id){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_code']=$request->product_code;
        $data['product_route']=$request->product_route;
        $data['product_garage']=$request->product_garage;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
         $image=$request->file('product_imgage');


        if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/product/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['product_imgage']=$image_url;
             $img=DB::table('products')->where('id',$id)->first();
             $image_path = $img->product_imgage;
             $done=unlink($image_path);
          $product=DB::table('products')->where('id',$id)->update($data); 
         if ($product) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['product_imgage']=$oldphoto;  
          $user=DB::table('products')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    
    }


    public function ImportProduct(){

      return view('import_product');
    }
     public function export() 
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }

    public function import(Request $request){
        
        $import=Excel::import(new ProductsImport, $request->file('import_file'));
         if ($import) {
                $notification=array(
                'messege'=>'Product Import Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.product')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          
    }
    
}
