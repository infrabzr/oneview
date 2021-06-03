<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/route-cache', function() {
     $exitCode = Artisan::call('route:cache');
     return 'Routes cache cleared';
 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/states_cities', [App\Http\Controllers\HomeController::class, 'states_cities'])->name('states_cities');
Route::get('/home/equipment_details', [App\Http\Controllers\HomeController::class, 'equipment_details'])->name('equipment_details');
Route::post('/home/equipment_detailssearch', [App\Http\Controllers\HomeController::class, 'equipment_detailssearch'])->name('equipment_detailssearch');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/home/rentalleaseexpiry', [App\Http\Controllers\HomeController::class, 'rentalleaseexpiry'])->name('rentalleaseexpiry');
Route::get('/home/newrequestwidgetclick/{id}', [App\Http\Controllers\HomeController::class, 'newrequestwidgetclick'])->name('newrequestwidgetclick');
Route::get('/home/documentsexpiry', [App\Http\Controllers\HomeController::class, 'documentsexpiry'])->name('documentsexpiry');
Route::get('/home/paymentreminder', [App\Http\Controllers\HomeController::class, 'paymentreminder'])->name('paymentreminder');
Route::get('/home/idleequipment', [App\Http\Controllers\HomeController::class, 'idleequipment'])->name('idleequipment');
Route::get('/home/equipemntbreakdown', [App\Http\Controllers\HomeController::class, 'equipemntbreakdown'])->name('equipemntbreakdown');
Route::get('/home/equipmentstatistics', [App\Http\Controllers\HomeController::class, 'equipmentstatistics'])->name('equipmentstatistics');
Route::post('/home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/home/superadmin', [App\Http\Controllers\HomeController::class, 'superadmin'])->name('superadmin');
Route::get('/home/senior', [App\Http\Controllers\HomeController::class, 'senior'])->name('senior');
Route::get('/home/requestfiledsuprvisor', [App\Http\Controllers\HomeController::class, 'requestfiledsuprvisor'])->name('requestfiledsuprvisor');
Route::get('/home/finance', [App\Http\Controllers\HomeController::class, 'finance'])->name('finance');
Route::get('/home/vendor', [App\Http\Controllers\HomeController::class, 'vendor'])->name('vendor');
Route::get('/home/requestequipment', [App\Http\Controllers\HomeController::class, 'requestequipment'])->name('requestequipment');
Route::get('/home/vendor_requestequipment/{id}', [App\Http\Controllers\HomeController::class, 'vendor_requestequipment'])->name('vendor_requestequipment');
Route::get('/home/vendor_approvedrequests', [App\Http\Controllers\HomeController::class, 'vendor_approvedrequests'])->name('vendor_approvedrequests');
Route::get('/home/vendor_approverentalcontract', [App\Http\Controllers\HomeController::class, 'vendor_approverentalcontract'])->name('vendor_approverentalcontract');
Route::get('/home/vendor_equipmentdetails', [App\Http\Controllers\HomeController::class, 'vendor_equipmentdetails'])->name('vendor_equipmentdetails');
Route::get('/home/vendor_paymentdetails', [App\Http\Controllers\HomeController::class, 'vendor_paymentdetails'])->name('vendor_paymentdetails');
Route::get('/home/filedsupervisorrequest', [App\Http\Controllers\HomeController::class, 'filedsupervisorrequest'])->name('filedsupervisorrequest');
Route::get('/home/requestsenior', [App\Http\Controllers\HomeController::class, 'requestsenior'])->name('requestsenior');
Route::get('/home/newrequestadd', [App\Http\Controllers\HomeController::class, 'newrequestadd'])->name('newrequestadd');
Route::get('/home/filedsupervisorrequest_details/{id}', [App\Http\Controllers\HomeController::class, 'filedsupervisorrequest_details'])->name('filedsupervisorrequest_details');
Route::get('/home/testingidle', [App\Http\Controllers\HomeController::class, 'testingidle'])->name('testingidle');

Route::post('/equipments/fieldsupervisor', [App\Http\Controllers\EquipmentsController::class, 'fieldsupervisor'])->name('fieldsupervisor');
Route::post('/equipments/vendordetails', [App\Http\Controllers\EquipmentsController::class, 'vendordetails'])->name('vendordetails');
Route::post('/equipments/projectdetails', [App\Http\Controllers\EquipmentsController::class, 'projectdetails'])->name('projectdetails');
Route::get('/equipments', [App\Http\Controllers\EquipmentsController::class, 'index'])->name('equipments');
Route::get('/equipments/create', [App\Http\Controllers\EquipmentsController::class, 'create'])->name('create');
Route::post('/equipments/store', [App\Http\Controllers\EquipmentsController::class, 'store'])->name('store');
Route::get('/equipments/equipment_detailview/{id}', [App\Http\Controllers\EquipmentsController::class, 'equipment_detailview'])->name('equipment_detailview');
Route::get('/equipments/vendor_equipment_detailview/{id}', [App\Http\Controllers\EquipmentsController::class, 'vendor_equipment_detailview'])->name('vendor_equipment_detailview');
Route::get('/equipments/equipment_vendor_detailview/{id}', [App\Http\Controllers\EquipmentsController::class, 'equipment_vendor_detailview'])->name('equipment_vendor_detailview');
Route::post('/equipments/requestjunior_create', [App\Http\Controllers\EquipmentsController::class, 'requestjunior_create'])->name('requestjunior_create');
Route::post('/equipments/update_dpr', [App\Http\Controllers\EquipmentsController::class, 'update_dpr'])->name('update_dpr'); 
Route::post('/equipments/update_endtime_dpr', [App\Http\Controllers\EquipmentsController::class, 'update_endtime_dpr'])->name('update_endtime_dpr'); 
Route::post('/equipments/addsparecategory', [App\Http\Controllers\EquipmentsController::class, 'addsparecategory'])->name('addsparecategory');
Route::post('/equipments/addspare', [App\Http\Controllers\EquipmentsController::class, 'addspare'])->name('addspare');
Route::post('/equipments/gettypes', [App\Http\Controllers\EquipmentsController::class, 'gettypes'])->name('gettypes');



/* DBR */
Route::get('/home/dbr_view', [App\Http\Controllers\HomeController::class, 'dbr_view'])->name('dbr_view');
Route::post('/home/equipmentsearch', [App\Http\Controllers\HomeController::class, 'equipmentsearch'])->name('equipmentsearch');
Route::post('/fieldsupervisor/equipmentsearch', [App\Http\Controllers\FieldsupervisorController::class, 'equipmentsearch'])->name('equipmentsearch');

/*Payments*/
Route::get('/home/paymentdetails', [App\Http\Controllers\HomeController::class, 'paymentdetails'])->name('paymentdetails');

/*fieldsupervisor*/
Route::get('/fieldsupervisor', [App\Http\Controllers\FieldsupervisorController::class, 'index'])->name('fieldsupervisor');
Route::get('/fieldsupervisor/widgetclick/{id}', [App\Http\Controllers\FieldsupervisorController::class, 'widgetclick'])->name('widgetclick'); 
Route::get('/fieldsupervisor/equipment_detailview/{id}', [App\Http\Controllers\FieldsupervisorController::class, 'equipment_detailview'])->name('equipment_detailview'); 
Route::get('/fieldsupervisor/create', [App\Http\Controllers\FieldsupervisorController::class, 'create'])->name('create');
Route::get('/fieldsupervisor/paymentdetails', [App\Http\Controllers\FieldsupervisorController::class, 'paymentdetails'])->name('paymentdetails');


/*finance*/
Route::get('/finance/dashboard', [App\Http\Controllers\FinanceController::class, 'index'])->name('finance');
Route::get('/finance/equipment_finance_detailview/{id}', [App\Http\Controllers\FinanceController::class, 'equipment_finance_detailview'])->name('equipment_finance_detailview');


/* Requests */
Route::get('/requests', [App\Http\Controllers\RequestforequipmentController::class, 'index'])->name('request'); 
Route::get('/requests/requestjunior', [App\Http\Controllers\RequestforequipmentController::class, 'requestjunior'])->name('requestjunior'); 
Route::post('/requests/addjuniorrequest', [App\Http\Controllers\RequestforequipmentController::class, 'addjuniorrequest'])->name('addjuniorrequest'); 
Route::get('/requests/requestsenior/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestsenior'])->name('requestsenior'); 
Route::post('/requests/addseniorrequest', [App\Http\Controllers\RequestforequipmentController::class, 'addseniorrequest'])->name('addseniorrequest');  
Route::get('/requests/requestvendor/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestvendor'])->name('requestvendor');   
Route::get('/requests/requestvendorapprove/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestvendorapprove'])->name('requestvendorapprove'); 
Route::post('/requests/addvendorrequest', [App\Http\Controllers\RequestforequipmentController::class, 'addvendorrequest'])->name('addvendorrequest'); 
Route::get('/requests/requestsenior_two/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestsenior_two'])->name('requestsenior_two'); 
Route::post('/requests/addsenior_tworequest', [App\Http\Controllers\RequestforequipmentController::class, 'addsenior_tworequest'])->name('addsenior_tworequest'); 
Route::get('/requests/requestwidgetclick/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestwidgetclick'])->name('requestwidgetclick'); 
Route::get('/requests/requests_detailview/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requests_detailview'])->name('requests_detailview');
Route::post('/home/requestsearch', [App\Http\Controllers\HomeController::class, 'requestsearch'])->name('requestsearch');
Route::post('/home/changedocumentstatus', [App\Http\Controllers\HomeController::class, 'changedocumentstatus'])->name('changedocumentstatus');
/* Projects */

Route::get('/projects', [App\Http\Controllers\ProjectsController::class, 'index'])->name('project'); 
Route::get('/projects/create', [App\Http\Controllers\ProjectsController::class, 'create'])->name('create'); 
Route::post('/projects/store', [App\Http\Controllers\ProjectsController::class, 'store'])->name('store'); 