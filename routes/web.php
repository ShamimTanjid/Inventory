<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'verified'], function(){



//Employee Route are here.............
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@AllEmployee')->name('all.employee');
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee');

// Coustomer Route are here...
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer','CustomerController@Sstore');
Route::get('/all-customer', 'CustomerController@Allcustomer')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer');



// Suppliers Route are here......
Route::get('/add-suppliers', 'SupplierController@index')->name('add.suppliers');
Route::post('/insert-supplier','SupplierController@store');
Route::get('/all-suppliers', 'SupplierController@Allsupplier')->name('all.suppliers');
Route::get('/view-supllier/{id}', 'SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');
Route::get('/edit-suppler/{id}', 'SupplierController@EditSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@UpdateSupplier');

// SALARY Route are here.......
Route::get('/add-advancedsalary', 'SalaryController@AddSalary')->name('add.advancedsalary');
Route::get('/all-advancedsalary', 'SalaryController@AllSalary')->name('all.advancedsalary');
Route::post('/insert-advancedsalary','SalaryController@Salarystore');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');


//Category Route are here...........
Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');
Route::post('/insert-category','CategoryController@Categorystore');
Route::get('/delete-category/{id}', 'CategoryController@Deletecategory');
Route::get('/edit-category/{id}', 'CategoryController@Editcategory');
Route::post('/update-category/{id}', 'CategoryController@Updatecategory');


//Product Route are here.....................
Route::get('/add-product', 'ProductController@Addproduct')->name('add.product');
Route::post('/insert-product','ProductController@Productstore');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/view-product/{id}', 'ProductController@Viewproduct');
Route::get('/edit-product/{id}', 'ProductController@Editproduct');
Route::post('/update-product/{id}', 'ProductController@updateproduct');


//Expens Route are here.........
Route::get('/add-expense', 'ExpensController@AddExpens')->name('add.expense');
Route::post('/insert-expense','ExpensController@Expensestore');
Route::get('/Today-expense', 'ExpensController@TodayExpense')->name('Today.expense');
Route::get('/edit-expense/{id}', 'ExpensController@EditExpense');
Route::post('/update-expense/{id}', 'ExpensController@updateExpense');
Route::get('/monthly-expense', 'ExpensController@MonthlyExpense')->name('Monthly.expense');
Route::get('/CurrentMonth-expense', 'ExpensController@PresentMonthlyExpense')->name('CureenMonthly.expense');
Route::get('/Yearly-Expense', 'ExpensController@YearlyExpense')->name('Yearly.expense');


//Month Expense rOUTE are here....
Route::get('/january-expense', 'ExpensController@JanExpens')->name('january.expense');
Route::get('/february-expense', 'ExpensController@FebExpens')->name('february.expense');
Route::get('/march-expense', 'ExpensController@MarchExpens')->name('march.expense');
Route::get('/april-expense', 'ExpensController@AprilExpens')->name('april.expense');
Route::get('/may-expense', 'ExpensController@MayExpens')->name('may.expense');
Route::get('/june-expense', 'ExpensController@JunExpens')->name('june.expense');
Route::get('/july-expense', 'ExpensController@JllyExpens')->name('july.expense');
Route::get('/august-expense', 'ExpensController@AugustExpens')->name('august.expense');
Route::get('/september-expense', 'ExpensController@SepExpens')->name('september.expense');
Route::get('/october-expense', 'ExpensController@OctExpens')->name('october.expense');
Route::get('/november-expense', 'ExpensController@NovemExpens')->name('november.expense');
Route::get('/december-expense', 'ExpensController@DecemExpens')->name('december.expense');



//Attendence Route are here.....
Route::get('/Take-Attendence', 'AttendenceController@TakeAttendence')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@InsertAttendence');
Route::get('/All-Attendence', 'AttendenceController@AllAttendence')->name('all.attendence');
Route::get('/edit-aatendence/{edit_date}', 'AttendenceController@EditAttendence');
Route::post('/update-attendence', 'AttendenceController@updateaatendence');
Route::get('/view-aatendence/{edit_date}', 'AttendenceController@ViewAttendence');



//Excell Import and Export...................
Route::get('/import-product', 'ProductController@ImportProduct')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');

//Setting route are here...
Route::get('/Website-Setting', 'AttendenceController@Setting')->name('setting');
Route::post('/update-website/{id}', 'AttendenceController@UpdateWebsite');


//....Pso route are here......
Route::get('/Pos', 'PosController@Index')->name('pos'); 
//orders in pos table...
Route::get('/pending-order', 'PosController@Pendingorder')->name('pending.order');
Route::get('/view-order-status/{id}', 'PosController@ViewOrderStatus'); 
Route::get('/pos-done/{id}', 'PosController@PosDone');  
Route::get('/success-order', 'PosController@successorder')->name('success.order');



//cart Route are hRERE............

Route::post('/add-cart', 'CartController@index');
Route::post('/cart-update/{rowId}', 'CartController@cartUpdate');
Route::get('cart-remove/{rowId}', 'CartController@cartRemove');
Route::post('/create-invoice', 'CartController@createinvoice');
Route::post('/final-invoice', 'CartController@finalinvoice');

});

