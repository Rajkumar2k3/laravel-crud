<?php

use App\Http\Controllers\Employeecontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Models\employee;

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
    return ['Laravel' => app()->version()];
});

Route::get('/about-us',[homecontroller::class,'aboutus']);

Route::group(['prefix'=>'admin'],function(){

    Route::get('/about-us/{id}', function ($id) {
        return 'your id is <b>'.$id.'<b>';
    });
    
    Route::get('/settings',function(){
        return 'This is settings page';
    });

});


Route::get('/any/rajkumar-is-a-laravel-developer', function(){
    return 'rajkumar is a laravel developer';
})->name('rajkumar');

require __DIR__.'/auth.php';

// Employee details

// Route::get('/employees',[Employeecontroller::class,'index'])->name('employee.index');
// Route::get('/employees/create',[Employeecontroller::class,'create'])->name('employee.create');
// Route::post('/employees/store',[Employeecontroller::class,'store'])->name('employee.store');
// Route::get('/employees/{employee}',[Employeecontroller::class,'show'])->name('employee.show');
// Route::get('/employees/{employee}/edit',[Employeecontroller::class,'edit'])->name('employee.edit');
// Route::put('/employees/{employee}',[Employeecontroller::class,'update'])->name('employee.update');
// Route::delete('/employees/{employee}',[Employeecontroller::class,'destroy'])->name('employee.destroy');


//Resouse Route

Route::resource('employee',Employeecontroller::class);
