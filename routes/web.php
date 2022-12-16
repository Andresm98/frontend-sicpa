<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DepartmentsEmployeesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])
    ->resource('/dashboard/users', UserController::class)->parameters(['user' => 'customer']);

Route::get('/dashboard/enterprises', [EnterpriseController::class, 'index'])->name('web.enterprises.index');

Route::get('/dashboard/employees', [EmployeeController::class, 'index'])->name('web.employees.index');

Route::get('/dashboard/departments', [DepartmentsController::class, 'index'])->name('web.departments.index');

Route::get('/dashboard/departments-employees', [DepartmentsEmployeesController::class, 'index'])->name('web.departments.employees.index');
