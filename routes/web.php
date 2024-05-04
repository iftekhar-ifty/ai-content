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


Route::get('admin/dashboard', \App\Livewire\Backend\Dashboard::class);
Route::get('admin/user-list', \App\Livewire\Backend\UserList::class);


require __DIR__.'/auth.php';
