<?php


use GuzzleHttp\Client;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Exception\ClientException;

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

Route::get('/', \App\Livewire\Frontend\HomePage::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//admin
Route::group(['prefix'=>'admin', 'middleware' => ['auth','user.type']], function(){

    Route::get('/dashboard', \App\Livewire\Backend\Dashboard::class);
    Route::get('/user-list', \App\Livewire\Backend\UserList::class);
    Route::get('/plan-list', \App\Livewire\Backend\PlanList::class);

});

//user

Route::group(['prefix'=>'user', 'middleware' => ['auth','user.type']], function(){
    Route::get('/dashboard', \App\Livewire\Backend\User\Dashboard::class);
    Route::get('/plan-list', \App\Livewire\Backend\User\UserPlanList::class);
    Route::get('/payment-history', \App\Livewire\Backend\User\UserPaymentHistory::class);
    Route::get('/payment/{id}', \App\Livewire\Backend\User\UserPayment::class);
});






Route::get('user-logout', function (){
    auth()->logout();
    return back();
});


require __DIR__.'/auth.php';
