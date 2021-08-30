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
// Route::get("send-email", [EmailController::class, "sendEmail"]);
Route::get('/vendorservices', [App\Http\Controllers\vendorServices::class, 'index'])->name('index');
Route::post('/vendorservices/getdata', [App\Http\Controllers\vendorServices::class, 'getdata'])->name('getdata');
Route::get('/email/sendEmail', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('sendEmail');
Route::post('/email/index', [App\Http\Controllers\EmailController::class, 'index'])->name('index');
Route::get('/modules', [App\Http\Controllers\ModulesController::class, 'index'])->name('modules');
Route::get('/home/updateprofile', [App\Http\Controllers\HomeController::class, 'updateprofile'])->name('updateprofile');
Route::post('/home/storeprofile', [App\Http\Controllers\HomeController::class, 'storeprofile'])->name('storeprofile');
Route::get('/home/invoiceview/{id}', [App\Http\Controllers\HomeController::class, 'invoiceview'])->name('invoiceview');
Route::get('/home/myprofile', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile');
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
Route::get('/home/vendoradmin', [App\Http\Controllers\HomeController::class, 'vendoradmin'])->name('vendoradmin');
Route::get('/home/operator', [App\Http\Controllers\HomeController::class, 'operator'])->name('operator');
Route::get('/home/technician', [App\Http\Controllers\HomeController::class, 'technician'])->name('technician');
Route::get('/home/chiefengineer', [App\Http\Controllers\HomeController::class, 'chiefengineer'])->name('chiefengineer');
Route::get('/home/requestequipment', [App\Http\Controllers\HomeController::class, 'requestequipment'])->name('requestequipment');


Route::get('/home/rejectedrequests_v', [App\Http\Controllers\HomeController::class, 'rejectedrequests_v'])->name('rejectedrequests_v');
Route::get('/home/vpendingatclient', [App\Http\Controllers\HomeController::class, 'vpendingatclient'])->name('vpendingatclient');

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
Route::get('/vendorequipment/createuser', [App\Http\Controllers\VendorequipmentController::class, 'createuser'])->name('createuser');
Route::get('/vendorequipment/userlist', [App\Http\Controllers\VendorequipmentController::class, 'userlist'])->name('userlist');
Route::get('/vendorequipment/create', [App\Http\Controllers\VendorequipmentController::class, 'create'])->name('create');
Route::get('/vendorequipment/rentalcreate', [App\Http\Controllers\VendorequipmentController::class, 'rentalcreate'])->name('rentalcreate');
Route::post('/equipments/store', [App\Http\Controllers\EquipmentsController::class, 'store'])->name('store');
Route::post('/vendorequipment/userstore', [App\Http\Controllers\VendorequipmentController::class, 'userstore'])->name('userstore');
Route::post('/vendorequipment/operatorsave', [App\Http\Controllers\VendorequipmentController::class, 'operatorsave'])->name('operatorsave');
Route::get('/vendorequipment/operatordelete/{id}', [App\Http\Controllers\VendorequipmentController::class, 'operatordelete'])->name('operatordelete');
Route::post('/vendorequipment/store', [App\Http\Controllers\VendorequipmentController::class, 'store'])->name('store');
Route::post('/vendorequipment/bulkupload', [App\Http\Controllers\VendorequipmentController::class, 'bulkupload'])->name('bulkupload');
Route::post('/vendorequipment/rentstore', [App\Http\Controllers\VendorequipmentController::class, 'rentstore'])->name('rentstore');
Route::post('/vendorequipment/arentstore', [App\Http\Controllers\VendorequipmentController::class, 'arentstore'])->name('arentstore');
Route::post('/vendorequipment/uploadlogsheet', [App\Http\Controllers\VendorequipmentController::class, 'uploadlogsheet'])->name('uploadlogsheet');
Route::post('/vendorequipment/uploadlogsheetevening', [App\Http\Controllers\VendorequipmentController::class, 'uploadlogsheetevening'])->name('uploadlogsheetevening');
Route::post('/vendorequipment/update', [App\Http\Controllers\VendorequipmentController::class, 'update'])->name('update');
Route::get('/vendorequipment', [App\Http\Controllers\VendorequipmentController::class, 'index'])->name('index');
Route::get('/servicecheckups/{id}', [App\Http\Controllers\VendorequipmentController::class, 'servicecheckups'])->name('servicecheckups');
Route::get('/equipments/equipment_detailview/{id}', [App\Http\Controllers\EquipmentsController::class, 'equipment_detailview'])->name('equipment_detailview');
Route::get('/equipments/vendor_equipment_detailview/{id}', [App\Http\Controllers\EquipmentsController::class, 'vendor_equipment_detailview'])->name('vendor_equipment_detailview');
Route::get('/equipments/equipment_vendor_detailview/{id}', [App\Http\Controllers\EquipmentsController::class, 'equipment_vendor_detailview'])->name('equipment_vendor_detailview');

Route::get('/vendorequipment/operator_equipment_detailview/{id}', [App\Http\Controllers\VendorequipmentController::class, 'operator_equipment_detailview'])->name('operator_equipment_detailview');

Route::get('/vendorequipment/equipment_technician_detailview/{id}', [App\Http\Controllers\VendorequipmentController::class, 'equipment_technician_detailview'])->name('equipment_technician_detailview');

Route::get('/vendorequipment/equipment_vendor_detailview/{id}', [App\Http\Controllers\VendorequipmentController::class, 'equipment_vendor_detailview'])->name('equipment_vendor_detailview');
Route::get('/vendorequipment/renewals/{id}', [App\Http\Controllers\VendorequipmentController::class, 'renewals'])->name('renewals');
Route::get('/vendorequipment/cancelrent/{id}', [App\Http\Controllers\VendorequipmentController::class, 'cancelrent'])->name('cancelrent');


Route::get('/vendorequipment/edit/{id}', [App\Http\Controllers\VendorequipmentController::class, 'edit'])->name('edit');
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
Route::get('/requests/frequestsenior/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'frequestsenior'])->name('frequestsenior'); 
Route::get('/requests/vpendingatclientdetails/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'vpendingatclientdetails'])->name('vpendingatclientdetails'); 
Route::post('/requests/addseniorrequest', [App\Http\Controllers\RequestforequipmentController::class, 'addseniorrequest'])->name('addseniorrequest');  
Route::get('/requests/requestvendor/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestvendor'])->name('requestvendor');   
Route::get('/requests/requestvendorapprove/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestvendorapprove'])->name('requestvendorapprove'); 
Route::post('/requests/addvendorrequest', [App\Http\Controllers\RequestforequipmentController::class, 'addvendorrequest'])->name('addvendorrequest'); 
Route::get('/requests/rejectedrequests_vdetails/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'rejectedrequests_vdetails'])->name('rejectedrequests_vdetails'); 
Route::get('/requests/requestsenior_two/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestsenior_two'])->name('requestsenior_two'); 
Route::get('/requests/frequestpending/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'frequestpending'])->name('frequestpending'); 
Route::get('/requests/requestpending/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestpending'])->name('requestpending');
 Route::get('/requests/document_verification/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'document_verification'])->name('document_verification'); 
 Route::get('/requests/fdocument_verification/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'fdocument_verification'])->name('fdocument_verification'); 
 Route::get('/requests/approve_contract/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'approve_contract'])->name('approve_contract'); 
Route::post('/requests/addsenior_tworequest', [App\Http\Controllers\RequestforequipmentController::class, 'addsenior_tworequest'])->name('addsenior_tworequest'); 
Route::get('/requests/requestwidgetclick/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requestwidgetclick'])->name('requestwidgetclick'); 
Route::get('/requests/requests_detailview/{id}', [App\Http\Controllers\RequestforequipmentController::class, 'requests_detailview'])->name('requests_detailview');
Route::post('/home/requestsearch', [App\Http\Controllers\HomeController::class, 'requestsearch'])->name('requestsearch');
Route::post('/home/changedocumentstatus', [App\Http\Controllers\HomeController::class, 'changedocumentstatus'])->name('changedocumentstatus');
Route::post('/home/rejectdoc', [App\Http\Controllers\HomeController::class, 'rejectdoc'])->name('rejectdoc');
Route::post('/home/generaterc', [App\Http\Controllers\HomeController::class, 'generaterc'])->name('generaterc');
Route::post('/home/accepetdoc', [App\Http\Controllers\HomeController::class, 'accepetdoc'])->name('accepetdoc');
Route::post('/home/approved', [App\Http\Controllers\HomeController::class, 'approved'])->name('approved');
/* Projects */

//Route::get('vendor/clientlist', [App\Http\Controllers\VendoradminController::class, 'clientlist'])->name('clientlist'); 
Route::get('/projects', [App\Http\Controllers\ProjectsController::class, 'index'])->name('project'); 
Route::get('/projects/create', [App\Http\Controllers\ProjectsController::class, 'create'])->name('create'); 
Route::post('/projects/store', [App\Http\Controllers\ProjectsController::class, 'store'])->name('store'); 

//VendorequipmentController

Route::get('/vendorequipment/workinghistory', [App\Http\Controllers\VendorequipmentController::class, 'workinghistory'])->name('workinghistory');
Route::get('/vendorequipment/assignproject/{id}', [App\Http\Controllers\VendorequipmentController::class, 'assignproject'])->name('assignproject');
Route::post('/vendorequipment/personofcontact', [App\Http\Controllers\VendorequipmentController::class, 'personofcontact'])->name('personofcontact');
Route::get('/vendorequipment/softDeletes/{id}', [App\Http\Controllers\VendorequipmentController::class, 'softDeletes'])->name('softDeletes');
Route::post('/vendorequipment/getclientcontacts', [App\Http\Controllers\VendorequipmentController::class, 'getclientcontacts'])->name('getclientcontacts');
Route::post('/vendorequipment/getprojectdetailsdata', [App\Http\Controllers\VendorequipmentController::class, 'getprojectdetailsdata'])->name('getprojectdetailsdata');
Route::get('leaderboard', [App\Http\Controllers\VendorequipmentController::class, 'leaderboard'])->name('leaderboard');
Route::get('technicianplanner', [App\Http\Controllers\VendorequipmentController::class, 'technicianplanner'])->name('technicianplanner');
Route::get('operatorplanner', [App\Http\Controllers\VendorequipmentController::class, 'operatorplanner'])->name('operatorplanner');
Route::post('getvendorequipment', [App\Http\Controllers\VendorequipmentController::class, 'getvendorequipment'])->name('getvendorequipment');
Route::post('getvendorequipmentcode', [App\Http\Controllers\VendorequipmentController::class, 'getvendorequipmentcode'])->name('getvendorequipmentcode');
Route::get('assignequipemnet/{id}', [App\Http\Controllers\VendorequipmentController::class, 'assignequipemnet'])->name('assignequipemnet');
Route::get('operassignequipment/{id}', [App\Http\Controllers\VendorequipmentController::class, 'operassignequipment'])->name('operassignequipment');
Route::get('equipment_daily_checkup/{id}', [App\Http\Controllers\VendorequipmentController::class, 'equipment_daily_checkup'])->name('equipment_daily_checkup');
Route::get('technician_daily_checkup/{id}', [App\Http\Controllers\VendorequipmentController::class, 'technician_daily_checkup'])->name('technician_daily_checkup');
Route::get('operator_daily_checkup/{id}', [App\Http\Controllers\VendorequipmentController::class, 'operator_daily_checkup'])->name('operator_daily_checkup');
Route::post('getvendorequipmentnumber', [App\Http\Controllers\VendorequipmentController::class, 'getvendorequipmentnumber'])->name('getvendorequipmentnumber');
Route::post('technicianplanner/store', [App\Http\Controllers\TechnicianplannersController::class, 'store'])->name('store');
Route::post('operatorplanner/store', [App\Http\Controllers\OperatorplannersController::class, 'store'])->name('store');
Route::post('technicianplanner/dalycheckup', [App\Http\Controllers\TechnicianplannersController::class, 'dalycheckup'])->name('dalycheckup');
Route::post('technicianplanner/adalycheckup', [App\Http\Controllers\TechnicianplannersController::class, 'adalycheckup'])->name('adalycheckup');
Route::post('technicianplanner/techdalycheckup', [App\Http\Controllers\TechnicianplannersController::class, 'techdalycheckup'])->name('techdalycheckup');
Route::post('technicianplanner/operatorcheckup', [App\Http\Controllers\TechnicianplannersController::class, 'operatorcheckup'])->name('operatorcheckup');
Route::post('technicianplanner/servicecheckup', [App\Http\Controllers\TechnicianplannersController::class, 'servicecheckup'])->name('servicecheckup');
Route::get('technicianplanner/fetchevent', [App\Http\Controllers\TechnicianplannersController::class, 'fetchevent'])->name('fetchevent');
Route::post('technicianplanner/servicecheckupstatus', [App\Http\Controllers\TechnicianplannersController::class, 'servicecheckupstatus'])->name('servicecheckupstatus');


/**************** Vendor clients *****************/
Route::get('/vendor/clientlist', [App\Http\Controllers\VendorclientsController::class, 'clientlist'])->name('clientlist');
Route::get('/vendor/createclients', [App\Http\Controllers\VendorclientsController::class, 'create'])->name('create');
Route::get('/vendor/createibclients', [App\Http\Controllers\VendorclientsController::class, 'createibclients'])->name('createibclients');
Route::post('/vendore/store', [App\Http\Controllers\VendorclientsController::class, 'store'])->name('store');
Route::post('/vendore/update', [App\Http\Controllers\VendorclientsController::class, 'update'])->name('update');
Route::post('/vendore/clientdetails', [App\Http\Controllers\VendorclientsController::class, 'clientdetails'])->name('clientdetails');
Route::get('/vendor/profiledetails/{id}', [App\Http\Controllers\VendorclientsController::class, 'profiledetails'])->name('profiledetails');
Route::get('/vendor/profileedit/{id}', [App\Http\Controllers\VendorclientsController::class, 'profileedit'])->name('profileedit');
Route::get('/vendor/readyforinvoice', [App\Http\Controllers\VendorclientsController::class, 'readyforinvoice'])->name('readyforinvoice');
Route::get('/vendor/listofinvoice/{id}', [App\Http\Controllers\VendorclientsController::class, 'listofinvoice'])->name('listofinvoice');
Route::post('/vendor/invoicestatus', [App\Http\Controllers\VendorclientsController::class, 'invoicestatus'])->name('invoicestatus');
Route::post('/vendor/uplaod_receipt', [App\Http\Controllers\VendorclientsController::class, 'uplaod_receipt'])->name('uplaod_receipt');

/******* warehouse **********/
Route::get('/warehouse/create', [App\Http\Controllers\WarehouseController::class, 'create'])->name('create');
Route::post('getvendorproject', [App\Http\Controllers\WarehouseController::class, 'getvendorproject'])->name('getvendorproject');
Route::post('getvendorclinet', [App\Http\Controllers\WarehouseController::class, 'getvendorclinet'])->name('getvendorclinet');
Route::post('warehouse/store', [App\Http\Controllers\WarehouseController::class, 'store'])->name('store');
Route::get('warehouse/show', [App\Http\Controllers\WarehouseController::class, 'show'])->name('show');
Route::get('warehouse/softDeletes/{id}', [App\Http\Controllers\WarehouseController::class, 'softDeletes'])->name('softDeletes');
Route::get('warehouse/edit/{id}', [App\Http\Controllers\WarehouseController::class, 'edit'])->name('edit');
Route::post('warehouse/update', [App\Http\Controllers\WarehouseController::class, 'update'])->name('update');


/******* Spare Parts **********/

Route::get('spareparts', [App\Http\Controllers\SparepartsController::class, 'index'])->name('index');
Route::get('sparepartslist', [App\Http\Controllers\SparepartsController::class, 'sparepartslist'])->name('sparepartslist');
Route::get('spareparts/create', [App\Http\Controllers\SparepartsController::class, 'create'])->name('create');
Route::post('spareparts/store', [App\Http\Controllers\SparepartsController::class, 'store'])->name('store');
Route::post('getwarehouselist', [App\Http\Controllers\SparepartsController::class, 'getwarehouselist'])->name('getwarehouselist');
Route::get('spareparts/softDeletes/{id}', [App\Http\Controllers\SparepartsController::class, 'softDeletes'])->name('softDeletes');
Route::get('spareparts/edit/{id}', [App\Http\Controllers\SparepartsController::class, 'edit'])->name('edit');
Route::post('spareparts/update', [App\Http\Controllers\SparepartsController::class, 'update'])->name('update');
Route::get('spareparts/show/{id}', [App\Http\Controllers\SparepartsController::class, 'show'])->name('show');
Route::post('spareparts/equfilter', [App\Http\Controllers\SparepartsController::class, 'equfilter'])->name('equfilter');
Route::post('spareparts/filter', [App\Http\Controllers\SparepartsController::class, 'filter'])->name('filter');
Route::post('spareparts/getvendorproject', [App\Http\Controllers\SparepartsController::class, 'getvendorproject'])->name('getvendorproject');
Route::post('spareparts/getequipment', [App\Http\Controllers\SparepartsController::class, 'getequipment'])->name('getequipment');
Route::post('spareparts/getwarehouse', [App\Http\Controllers\SparepartsController::class, 'getwarehouse'])->name('getwarehouse');
Route::post('spareparts/getsubcategories', [App\Http\Controllers\SparepartsController::class, 'getsubcategories'])->name('getsubcategories');
/******* Spare Parts Categories**********/


Route::get('sparepartscategories', [App\Http\Controllers\SparepartscategoriesController::class, 'index'])->name('index');
Route::get('sparepartscategories/create', [App\Http\Controllers\SparepartscategoriesController::class, 'create'])->name('create');
Route::post('sparepartscategories/store', [App\Http\Controllers\SparepartscategoriesController::class, 'store'])->name('store');
Route::get('sparepartscategories/softDeletes/{id}', [App\Http\Controllers\SparepartscategoriesController::class, 'softDeletes'])->name('softDeletes');
Route::get('/sparepartscategories/edit/{id}', [App\Http\Controllers\SparepartscategoriesController::class, 'edit'])->name('edit');
Route::post('/sparepartscategories/update', [App\Http\Controllers\SparepartscategoriesController::class, 'update'])->name('update');


/******* Spare Parts Sub Categories**********/

Route::get('sparepartssubcategories', [App\Http\Controllers\SparepartssubcategoriesController::class, 'index'])->name('index');
