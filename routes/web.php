<?php


use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\GoogleController;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', \App\Livewire\Frontend\HomePage::class)->middleware(['verifyEmail','auth']);

//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');

Route::get('success', [PaymentController::class, 'success'])->name('success');
Route::get('cancel', function (){
    dd('cancel');
})->name('cancel');

Route::get('mm', function (){
    
    
    
    return back();
    
   return view('mail.verify',[
       'url' => 'sdsdf'
   ]);
})->name('cancel');



Route::get('email-verify', function(){


                $checkPlan = \App\Models\Plan::query()->where('type', 'trial')->first();

                $checkUserPlanExits =  \App\Models\UserPlan::query()->where( 'user_id', auth()->id())->exists();
                
                if(!$checkUserPlanExits){
        
                          \App\Models\UserPlan::query()->create([
                        'plan_id' => $checkPlan->id,
                        'user_id' =>auth()->id(),
                        'word_limit' => $checkPlan->word_limit,
                        'subscribed_at' => now(),
                        'expire_date' => \Carbon\Carbon::now()->addMonths($checkPlan->duration),
                    ]);
                }

          
                    
                    
                    

    if(auth()->user()->email_verified_at != null){
        return redirect('/');
    }
    return view('email-verify');
})->name('verification.noticeResend');

Route::get('resend-email', function(){
    Auth::user()->sendEmailVerificationNotification();


})->name('resend.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth'])->name('verification.verify');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//admin
Route::group(['prefix'=>'admin', 'middleware' => ['auth','admin','verifyEmail']], function(){

    Route::get('/dashboard', \App\Livewire\Backend\Dashboard::class)->name('admin.dashboard');
    Route::get('/user-list', \App\Livewire\Backend\UserList::class);
    Route::get('/plan-list', \App\Livewire\Backend\PlanList::class);
    Route::get('/payment-list', \App\Livewire\Backend\PaymentHistory::class);
    Route::get('/setting', \App\Livewire\Backend\GeneralSetting::class);

});

//user

Route::group(['prefix'=>'user', 'middleware' => ['auth','user','verifyEmail']], function(){
    Route::get('/dashboard', \App\Livewire\Backend\User\Dashboard::class)->name('user.dashboard');
    Route::get('/plan-list', \App\Livewire\Backend\User\UserPlanList::class);
    Route::get('/payment-history', \App\Livewire\Backend\User\UserPaymentHistory::class);
    Route::get('/get-payment', \App\Livewire\Backend\User\StripePayment::class);
    Route::get('/payment/{id}', \App\Livewire\Backend\User\UserPayment::class);
});

Route::get('payment-checkout/{id}', \App\Livewire\Frontend\PaymentCheckout::class);


Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('user-logout', function (){
    auth()->logout();
    return back();
});


require __DIR__.'/auth.php';
