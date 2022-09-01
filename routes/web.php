<?php

use App\Http\Controllers\replyController;
use App\Http\Controllers\supportTicketController;
use Illuminate\Support\Facades\Mail;
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
    return view('pages/landing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); 

// ----------------------------supportTicketController----------------------------------
// store-data
Route::post('store-data',[supportTicketController::class,'store']);
// view tickets list
Route::post('ticketlist',[supportTicketController::class,'allTicketDetails']);
//ticketlistCustomerWise
Route::post('ticketlistCustomerWise',[supportTicketController::class,'ticketlistCustomerWise']);
// view ticket
Route::get('view_ticket/{page}',[supportTicketController::class,'index']);
//search_ref
Route::post('search_ref',[supportTicketController::class,'search_ref']);


//------------------------------replyController------------------------------------------
//store-reply
Route::post('view_ticket/store-reply',[replyController::class,'store']);



