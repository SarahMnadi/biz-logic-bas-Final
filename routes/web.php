<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Auth::routes();
// Route::get('/dashboard2', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');


//Route for staff datatable
Route::get('/getstaffs', [App\Http\Controllers\StaffController::class, 'getStaffs'])->name('getStaffs');
Route::get('staffs', [App\Http\Controllers\StaffController::class, 'index'])->name('staffs');

//Route to add Staff
Route::get('user/add/Staff', [App\Http\Controllers\UserController::class, 'create'])->name('addUser');
Route::post('staff', [App\Http\Controllers\UserController::class, 'Staff'])->name('Staff');

//Route for all staffs with edit and delete button in action
Route::get('staff/informations/{id}', [App\Http\Controllers\StaffController::class, 'staffInfo'])->name('getAll');

//edit staff
Route::get('edit/Staff/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('edit');
//update staff
Route::post('edit', [App\Http\Controllers\StaffController::class, 'update'])->name('update');


// Routes for Department controller
Route::get('department/{id}', [App\Http\Controllers\DepartmentController::class, 'index'])->name('manageDepartment');
Route::post('department', [App\Http\Controllers\DepartmentController::class, 'department2'])->name('storeDepartment');
Route::get('/departments', [App\Http\Controllers\DepartmentController::class, 'showAll'])->name('showAllDepartments');


Route::get('department/edit/{id}', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('editDepartment');
Route::post('department/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('updateDepartment');













// Route::get('/user/addUser', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('addUser')->middleware('auth');
// Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'view'])->name('profile')->middleware('auth');

// Route::get('/user/changepassword', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changepassword')->middleware('auth');
// Route::get('/organization/index', [App\Http\Controllers\OrganizationController::class, 'index'])->name('organization')->middleware('auth');














// Route::get('/device/index', [App\Http\Controllers\DeviceController::class, 'index'])->name('device')->middleware('auth');




// Routes for organization controller
Route::get('organization/{id}', [App\Http\Controllers\OrganizationController::class, 'index'])->name('manageOrganization');
Route::get('organization/edit/{id}', [App\Http\Controllers\OrganizationController::class, 'edit'])->name('editOrganization');
Route::get('organization/showOne/{id}', [App\Http\Controllers\OrganizationController::class, 'showOne'])->name('showOneOrganization');
Route::get('organizationnnnn/showAll', [App\Http\Controllers\OrganizationController::class, 'showAll'])->name('showAllOrganizations');
Route::get('organization/showLatestTen', [App\Http\Controllers\OrganizationController::class, 'showLatestTen'])->name('showLatestTenOrganizations');
Route::post('organization/store', [App\Http\Controllers\OrganizationController::class, 'store'])->name('storeOrganization');
Route::get('organization/returnName/{id}', [App\Http\Controllers\OrganizationController::class, 'returnName'])->name('returnOrganizationName');
Route::post('organization/update/', [App\Http\Controllers\OrganizationController::class, 'update'])->name('updateOrganization');

// Routes for Branch controller
Route::get('branch/showAll', [App\Http\Controllers\BranchController::class, 'showAll'])->name('showAllBranches');
Route::post('branch/store/', [App\Http\Controllers\BranchController::class, 'store'])->name('storeBranch');
Route::get('branch/{id}', [App\Http\Controllers\BranchController::class, 'index'])->name('manageBranch');
Route::get('branch/edit/{id}', [App\Http\Controllers\BranchController::class, 'edit'])->name('editBranch');
Route::get('branch/showOne/{id}', [App\Http\Controllers\BranchController::class, 'showOne'])->name('showOneBranch');


Route::post('branch/update', [App\Http\Controllers\BranchController::class, 'update'])->name('updateBranch');

// Routes for Device controller
Route::post('device/store', [App\Http\Controllers\DeviceController::class, 'store'])->name('storeDevice');
Route::get('device/showAll', [App\Http\Controllers\DeviceController::class, 'showAll'])->name('showAllDevices');
Route::get('device/{id}', [App\Http\Controllers\DeviceController::class, 'index'])->name('deviceManage');
Route::get('device/edit/{id}', [App\Http\Controllers\DeviceController::class, 'edit'])->name('editDevice');
Route::get('device/showOne/{id}', [App\Http\Controllers\DeviceController::class, 'showOne'])->name('showOneDevice');
Route::post('device/update', [App\Http\Controllers\DeviceController::class, 'update'])->name('updateDevice');
Route::get('device/changeMode/{token}/{mode}', [App\Http\Controllers\DeviceController::class, 'changeMode'])->name('changeDeviceMode');
//hardware
Route::get('device/checkMode/{deviceToken}', [App\Http\Controllers\DeviceController::class, 'checkMode'])->name('checkDeviceMode');

// Routes for User controller
// Route::resource('/user','App\Http\Controllers\UserController');
Route::get('user/showAll', [App\Http\Controllers\UserController::class, 'showAll'])->name('showAllUsers');
Route::post('user/fingerprintEnroll', [App\Http\Controllers\UserController::class, 'fingerprintEnroll'])->name('fingerprintEnroll');
Route::post('user/rfidEnroll', [App\Http\Controllers\UserController::class, 'rfidEnroll'])->name('rfidEnroll');
Route::post('user/authorizedRooms', [App\Http\Controllers\UserController::class, 'registerAuthorizedRooms'])->name('registerAuthorizedRooms');


Route::get('user/details', [App\Http\Controllers\UserController::class, 'details'])->name('showUserDetails');


Route::get('user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('showUserProfile');
Route::get('user/enrolledUsers/{id}', [App\Http\Controllers\UserController::class, 'enrolledUser'])->name('enrolledUser');
Route::get('user/unenrolledUsers/{id}', [App\Http\Controllers\UserController::class, 'unenrolledUser'])->name('unenrolledUser');
Route::get('user/usersWithCard/{id}', [App\Http\Controllers\UserController::class, 'usersWithCard'])->name('usersWithCard');
Route::get('user/usersWithoutCard/{id}', [App\Http\Controllers\UserController::class, 'usersWithoutCard'])->name('usersWithoutCard');
Route::get('user/allUsers/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('allUsers');
Route::get('user/changePassword', [App\Http\Controllers\UserController::class, 'showchangePassword'])->name('showChangePassword');
Route::post('user/changePassword', [App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
Route::get('user/delete/{userId}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');

Route::get('user/showOne/{id}', [App\Http\Controllers\UserController::class, 'showOne'])->name('showOneUsers');
//hardware
Route::get('user/fingerprintId/{deviceToken}', [App\Http\Controllers\UserController::class, 'fingerPrintId'])->name('userFingerPrintId');
Route::get('user/confirmEnrollment/{fingerPrintId}/{deviceToken}', [App\Http\Controllers\UserController::class, 'confirmEnrollment'])->name('confirmUserEnrollment');
Route::get('user/deleteUserEnrolled/{deviceToken}', [App\Http\Controllers\UserController::class, 'deleteUserEnrolled'])->name('userFingerPrintId');

Route::get('user/export', [App\Http\Controllers\UserController::class, 'exportAllUsers'])->name('exportAllUsers');
Route::get('user/export', [App\Http\Controllers\UserController::class, 'exportAllLogs'])->name('exportAllLogs');



// Routes for Log control
Route::get('log/rfid-overall-logs/{user_id}', [App\Http\Controllers\LogController::class, 'rfidOverallLogs'])->name('rfidoverallLogs');
Route::get('log/fingerprint-overall-logs', [App\Http\Controllers\LogController::class, 'fingerprintOverallLogs'])->name('fingerprintoverallLogs');
Route::get('log/allLogs', [App\Http\Controllers\LogController::class, 'allLogs'])->name('allLogs');
Route::get('log/sensitiveLogs/{user_id}', [App\Http\Controllers\LogController::class, 'sensitiveLogs'])->name('sensitiveLogs');
Route::get('log/nonSensitiveLogs/{user_id}', [App\Http\Controllers\LogController::class, 'nonSensitiveLogs'])->name('nonSensitiveLogs');
Route::get('log/presentees/{user_id}', [App\Http\Controllers\LogController::class, 'usersPresentToday'])->name('userPresentToday');
Route::get('log/absentees/{user_id}', [App\Http\Controllers\LogController::class, 'usersAbsenteToday'])->name('usersAbsenteToday');
Route::get('log/userlog/{user_id}', [App\Http\Controllers\LogController::class, 'userSpecificLogs'])->name('userSpecificLogs');
//hardware

Route::get('log/fingerprintCheckInOrOut/{fingerPrintId}', [App\Http\Controllers\LogController::class, 'fingerprintCheckInOrOut'])->name('fingerprintCheckInOrOut');


Route::get('log/rfidCheckInOrOut/{cardUid}/{deviceToken}', [App\Http\Controllers\LogController::class, 'rfidCheckInOrOut'])->name('rfidCheckInOrOut');


//ROUTES FOR ROOM CONTROLLER
Route::get('room/manage', [App\Http\Controllers\RoomController::class, 'showManage'])->name('showRoomManage');
Route::post('room/store', [App\Http\Controllers\RoomController::class, 'storeRoom'])->name('storeRoom');
Route::get('room/showAll', [App\Http\Controllers\RoomController::class, 'showAll'])->name('showAllRooms');

Route::get('check/Match_Print', [App\Http\Controllers\checkController::class, 'Match_Print'])->name('Match_Print');

Route::get('dept', [App\Http\Controllers\StaffController::class, 'getDepartment'])->name('getDepartment');
Route::get('gender', [App\Http\Controllers\StaffController::class, 'getGender'])->name('getGender');
//delete staff
Route::get('delete/{id}', [App\Http\Controllers\StaffController::class, 'delete'])->name('delete');;

//edit staff
// Route::get('edit', [App\Http\Controllers\StaffController::class, 'edit'])->name('edit');

// Route::post('update', [App\Http\Controllers\StaffController::class, 'update'])->name('update');


Route::post('department/update', [App\Http\Controllers\DepartmentController::class, 'update'])->name('updateDepartment');




//Route for staff Details in dashboard
Route::get('staffDetails', [App\Http\Controllers\StaffDetailsController::class, 'staffDetails'])->name('Details');
Route::get('details', [App\Http\Controllers\staffDetailsController::class, 'index'])->name('staffDetails');

// Route::get('user/details', [App\Http\Controllers\UserController::class, 'details'])->name('showUserDetails');







Route::get('/users', [EmployeeController::class, 'index'])->name('users.index');

Route::get('api/customers','CustomerController@data');
Route::get('customers', [CustomerController::class, 'index'])->name('index');
Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('index');

Route::get('/present', [App\Http\Controllers\DashboardController::class, 'present'])->name('present');
Route::get('/present', [App\Http\Controllers\DashboardController::class, 'present'])->name('present');





// Route::get('customers','CustomerController@index');
//KIHANGA
Route::get('/staff/{staff_id}', [App\Http\Controllers\StaffController::class, 'getStaff'])->name('getStaff');

// Route::get('/gender', [App\Http\Controllers\DashboardController::class, 'gender'])->name('gender');

Route::get('/time/{id}', [App\Http\Controllers\DashboardController::class, 'getTime'])->name('getTime');
Route::get('/des', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('getgender');

Route::get('/absent', [App\Http\Controllers\DashboardController::class, 'absent'])->name('absent');

// Route::get('/hours/{staff_id}', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

// Route::get('/hours/{id}', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');



//Route for staff Details in dashboard
// Route::get('staffDetails', [App\Http\Controllers\AttendanceController::class, 'staffDetails'])->name('Details');
// Route::get('details', [App\Http\Controllers\AttendanceController::class, 'index'])->name('staffDetails');;


// Route::get('details', [App\Http\Controllers\AttendanceController::class, 'index'])->name('staffDetails');;

Route::get('/time/{id}', [App\Http\Controllers\DashboardController::class, 'time'])->name('time');






