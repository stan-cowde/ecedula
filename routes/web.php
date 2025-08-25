<?php

use App\Services\Paymongo\Paymongo;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.index');
});



Route::get('/login', [App\Http\Controllers\AuthenticateController::class, 'showLoginForm'])->name('login');
Route::get('/register', [App\Http\Controllers\AuthenticateController::class, 'showRegisterForm'])->name('show.register');

Route::post('/register', [App\Http\Controllers\AuthenticateController::class, 'register'])->name('register');
Route::post('/authenticate', [App\Http\Controllers\AuthenticateController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [App\Http\Controllers\AuthenticateController::class, 'logout'])->name('logout');





Route::middleware(['role:user'])->group(function () {


///////////////////////////////////////////////[VIEW ROUTS]/////////////////////////////////////////
    Route::view('/user/dashboard', 'User.dashboard')->name('user.dashboard');
    Route::view('/user/verification/pending', 'User.verification_request')->name('user.verification.pending');
    Route::view('/user/payment-history', 'User.payment-history')->name('user.payment-history');
    Route::view('/user/profile', 'User.profile')->name('user.profile');
    Route::view('/user/create-payment', 'User.create-payment')->name('user.create-payment');




///////////////////////////////////////////////[GET ROUTS]/////////////////////////////////////////
    Route::get('user/paymongo/checkout/success', \App\Livewire\User\Checkout\SuccessPage::class)->name('user.checkout.success');

    Route::get('user/paymongo/checkout/fail', [\App\Livewire\User\Checkout\CancelPage::class])->name('user.checkout.fail');



        Route::get('/user/forms/{step}', function ($step){

            // Pass the $id to the view
            return view('livewire.user.step-wizard', compact('step'));

        })->name('user.forms');



        Route::get('/user/paymongo/checkout/amount={income}', function ($income) {

            $paymongo = new Paymongo($income);

            $paymongo->redirectToPaymongoCheckout();

        })->name('user.paymongo.checkout');

        // Serve private identity image securely
        Route::get('/user/identity/{identity}/image', [\App\Http\Controllers\IdentityImageController::class, 'show'])->name('user.identity.image');

        Route::get('/user/payment/success', function (Illuminate\Http\Request $request) {

            $amount = $request->query('amount');
            $transactionID = $request->query('transactionID');
            $user_id = $request->query('user_id');
            $name = auth()->check() ? auth()->user()->firstname . ' ' . auth()->user()->lastname : 'Guest';

            return view('User.payment-success-page', compact('amount', 'transactionID', 'name', 'user_id'));

        })->name('user.payment.success');


});






Route::middleware(['role:admin'])->group(function () {


   Route::view('/admin/dashboard', 'Admin.dasbhoard')->name('admin.dashboard');
   Route::view('/admin/pending', 'Admin.pending')->name('admin.pending');
   Route::view('/admin/approved-users', 'Admin.approved-users')->name('admin.approved-users');
   Route::view('/admin/disapproved-users', 'Admin.disapproved-users')->name('admin.disapproved-users');
   Route::view('/admin/accounts-table', 'Admin.accounts-table')->name('admin.accounts-table');
   Route::view('/admin/reports', 'Admin.reports')->name('admin.reports');
   Route::view('/test-pdf', 'components.printables.print-collection-reports')->name('test-pdf');


   Route::get('/view-pdf', function (){
       $start = "2024-12-29 00:00:00";
       $end = "2024-12-31 23:00:00";

       $data = \DB::table('collection_and_deposit_reports')
           ->where('created_at', '>=', $start)
           ->where('created_at', '<=', $end)
           ->get()
           ->toArray();

       $totalAmount = \DB::table('collection_and_deposit_reports')
           ->where('created_at', '>=', $start)
           ->where('created_at', '<=', $end)
           ->sum('amount');

       $html = view('components.printables.print-collection-reports', ['information' => $data, 'totalAmount' => $totalAmount])->render();


       $header = view('components.printables.header')->render();


       $footer = view('components.printables.footer')->render();


       $pdf = \Spatie\Browsershot\Browsershot::html($html)
           ->format('A4')
           ->showBackground()
           ->setOption('marginTop', 50)
           ->setTemporaryDirectory(storage_path('app/temp'))
           ->pdf();


       return new Response($pdf, 200, [
          'Content-Type' => 'application/pdf',
           'Content-Disposition' => 'inline; filename="test-' . uuid_create() . '.pdf"'
       ]);

   });

});
