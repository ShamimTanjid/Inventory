<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function AddCategory(){
    	return view('add_category');
    }

        public function Categorystore(Request $request){
           $data=array();
           $data['cat_name']=$request->cat_name;
        
        $cat=DB::table('categories')->insert($data);
        if($cat){
                 $notification=array(
                 'messege'=>'Successfully Advanced Paid ',
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



     public function AllCategory(){

     	$category=DB::table('categories')->get();
    	return view('all_category',compact('category'));
    }


    public function Deletecategory($id){
    	$Delete=DB::table('categories')
    	         ->where('id',$id)
    	         ->delete();
    	   if($Delete){
                 $notification=array(
                 'messege'=>'Successfully Advanced Paid ',
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

    public function Editcategory($id){

    	$edit=DB::table('categories')
    	       ->where('id',$id)
    	       	->first();

    	return view('edit_category',compact('edit'));
    }
    public function Updatecategory(Request $request,$id){
    	
           $data=array();
           $data['cat_name']=$request->cat_name;


    	$update=DB::table('categories')
    	        ->where('id',$id)
    	        ->update($data);


    	if($update){
                 $notification=array(
                 'messege'=>'Successfully Advanced Paid ',
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
}
