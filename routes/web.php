<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth','user-access:User')->group(function () {

    Route::get('/',[DataController::class,'home'])->name('/');
    Route::post('create',[DataController::class,'create'])->name('data.create');
    Route::get('show',[DataController::class,'show'])->name('data.show');
    Route::get('/updata/{id}',[DataController::class,'updateblade'])->name('data.showblade'); 
    Route::get('/update',[DataController::class,'update'])->name('update');
    Route::post('/newdata',[DataController::class,'updatedata'])->name('newdataupdatedata');
    Route::get('/deleteproduct',[DataController::class,'deletedata'])->name('deleteproduct');
    Route::get('/rightjoin',[DataController::class,'rightjoin'])->name('rightjoin');
    Route::get('/leftjoin',[DataController::class,'leftjoin'])->name('leftjoin');
    


    });

Auth::routes();

