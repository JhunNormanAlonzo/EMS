<?php


use App\Http\Controllers\MailController;
use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LeaveController;
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

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::view('/employee', 'admin.create');


Route::group(['middleware' => ['auth', 'has.permission']], function (){
    Route::get('/', function (){
        return view('admin.index');
    });
    Route::resource('departments', DepartmentController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('leaves', LeaveController::class);
    Route::resource('notices', NoticeController::class);
    Route::post('accept-reject-leave/{id}', [LeaveController::class, 'acceptReject'])->name('accept.reject');
    Route::get('/mail', [MailController::class, 'create'])->name('mails.create');
    Route::post('/mail', [MailController::class, 'store'])->name('mails.store');
});



