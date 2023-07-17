<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Mail\Test as TestMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\TestJob;
use App\Http\Controllers\Web\UserController;
use Illuminate\Http\Response;


Route::prefix('web')->group(function() {
    // Add single page app api routes
    Route::prefix('/user')->group(function () {
        Route::post('/register', [UserController::class,'register']);
        Route::post('/', [UserController::class,'login']);
        Route::delete('/logout', [UserController::class,'logout']);
        Route::get('/authorize', [UserController::class,'authorizeUser']);
    });
    Route::get('/users', [UserController::class,'getUsers']);
});

Route::get('/job', function() {
    Log::debug('here');
    TestJob::dispatch()
        ->onConnection('redis')
        ->onQueue('stuff');
    return response('Success');
});

Route::get('/email', function () {
    Log::debug('test');
    
    $email = new TestMail();
    Mail::to('recipient@localhost')->send($email);
    return $email;
});

Route::get('/', function() {
    return response()->json(['Message' => 'Success']);
});

Route::fallback(function() {
    return abort(404);
});
