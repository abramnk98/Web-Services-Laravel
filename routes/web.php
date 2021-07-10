<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
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

// User Routes

Route::get('/', function () {

   $pages = App\Models\Page::where('status', 'on')->orderBy('order')->get();

   $services = App\Models\Service::where('status', 'on')->paginate(3);

   $employees = App\Models\Employee::paginate(3);

   return view('user.index', [
       "pages" => $pages,
       "services" => $services,
       "employees" => $employees,
   ]);
})->name('home_page');



// Admin Routes

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

// Services Route
Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');

Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');

Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');

Route::get('/admin/services/edit/{id}', [ServiceController::class, 'edit'])->where(['id' => '[0-9]+'])->name('admin.services.edit');

Route::put('/admin/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');

Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

// Pages Route

Route::resource('/admin/pages', PageController::class)
    ->where(['page' => '[0-9]+'])
    ->names([
        'index' => 'admin.pages.index',
        'store' => 'admin.pages.store',
        'create' => 'admin.pages.create',
        'show' => 'admin.pages.show',
        'update' => 'admin.pages.update',
        'destroy' => 'admin.pages.destroy',
        'edit' => 'admin.pages.edit',
    ]);

Route::put('admin/pages/changestatus/{page}', [PageController::class, 'changeStatus'])->where(['page' => '[0-9]+'])->name('admin.pages.changestatus');

// Employee Route

Route::resource('/admin/employees', EmployeeController::class)
    ->where(['employee' => '[0-9]+'])
    ->names([
        'index' => 'admin.employees.index',
        'store' => 'admin.employees.store',
        'create' => 'admin.employees.create',
        'show' => 'admin.employees.show',
        'update' => 'admin.employees.update',
        'destroy' => 'admin.employees.destroy',
        'edit' => 'admin.employees.edit',
    ]);

// Profile Route

Route::resource('/admin/profiles', ProfileController::class)
    ->where(['profile' => '[0-9]+'])
    ->names([
        'index' => 'admin.profiles.index',
        'store' => 'admin.profiles.store',
        'create' => 'admin.profiles.create',
        'show' => 'admin.profiles.show',
        'update' => 'admin.profiles.update',
        'destroy' => 'admin.profiles.destroy',
        'edit' => 'admin.profiles.edit',
    ]);

