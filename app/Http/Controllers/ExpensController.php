<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpensController extends Controller
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

   public function AddExpens(){
   	   return view('Add_expens');
   }
   public function Expensestore(Request $request){

   	$data=array();
   	$data['details']=$request->details;
   	$data['amount']=$request->amount;
   	$data['month']=$request->month;
   	$data['date']=$request->date;
   	$data['year']=$request->year;


   	$expense=DB::table('expenses')->insert($data);

   	if ($expense) {
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
                

   }
   public function TodayExpense(){

   	$date= date("d/m/y");
   	$today=DB::table('expenses')->where('date',$date)->get();
   	return view('Today_expense',compact('today'));


   }
   public function EditExpense($id){
   	$eidt=DB::table('expenses')->where('id',$id)->first();
   	return view('edit_expense',compact('eidt'));
   }
   public function updateExpense(Request $request,$id){

	$data=array();
   	$data['details']=$request->details;
   	$data['amount']=$request->amount;
   	$data['month']=$request->month;
   	$data['date']=$request->date;
   	$data['year']=$request->year;


   	$update=DB::table('expenses')->where('id',$id)->update($data);

   	if ($update) {
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
                

   }
   public function MonthlyExpense(){
    $month=date("F");

    $mnthExpense=DB::table('expenses')->where('month',$month)->get();
    return view('month_expense',compact('mnthExpense'));

   }

     public function YearlyExpense(){
     $Year=date("Y");

    $YearExpense=DB::table('expenses')->where('year',$Year)->get();
    return view('year_expense',compact('YearExpense'));
}

  public function JanExpens(){
       $month="January";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function FebExpens(){
       $month="February";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function MarchExpens(){
       $month="March";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function AprilExpens(){
       $month="April";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function MayExpens(){
       $month="May";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function JunExpens(){
       $month="Jun";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function JllyExpens(){
       $month="July";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function AugustExpens(){
       $month="Augut";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function SepExpens(){
       $month="September";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function OctExpens(){
       $month="October";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function NovemExpens(){
       $month="November";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function DecemExpens(){
       $month="December";
       $mnthExpense=DB::table('expenses')->where('month',$month)->get();
       return view('month_expense',compact('mnthExpense'));

   }
   public function PresentMonthlyExpense(){
       $tmonth=date("F");
       $tmnthExpense=DB::table('expenses')->where('month',$tmonth)->get();
       return view('Current Month_expense',compact('tmnthExpense'));

   }
}