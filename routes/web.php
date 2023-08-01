<?php

//use App\Http\Controllers\Indexregistration;

// use App\Http\Controllers\divecesController;
// use App\Http\Controllers\Indexbook;
// use App\Http\Controllers\IndexCustomer;
// use App\Http\Controllers\Indexeducation;
// use App\Http\Controllers\Registartioncontroller;

use App\Http\Controllers\Indexstudent;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\RouterDataCollector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return 'hello student';
});

Route::get('store-student',function()
{
    return view('crud.index');
});


Route::delete('/delete-student/{id}', 'indexstudent@deleteStudent')->name('delete-student');

Route::get('/crud.delete/{id}', 'indexstudent@deleteStudent')->name('delete-student');
Route::get('/crud.edit/{id}', 'indexstudent@editStudent')->name('edit-student');

Route::get('/view', [Indexstudent::class, 'view'])->name('view');
Route::get('/book', [Indexstudent::class, 'index'])->name('index');
Route::post('/store-student', [Indexstudent::class, 'store'])->name('store-student');


Route::get('/edit',function()
{
    return view('crud.edit');
});