<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

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

// 認証不要機能
Route::get('/', [User\HomeController::class, 'index']);
Route::get('search', [User\SearchController::class, 'index'])->name('search.index');
Route::resource('item', User\ItemController::class);

// 認証が必要な機能
Route::middleware('auth')->group(function () {
    Route::resource('item.review', User\ReviewController::class)->only(['create', 'store', 'destroy']);
    Route::resource('reviewer', User\ReviewerController::class)->only(['create', 'store']);
});
// 定義順の関連でここで定義 (認証不要機能)
Route::resource('reviewer', User\ReviewerController::class)->only(['show']);



// 認証関連 ログイン前 
Route::middleware('guest')->group(function () {
    Route::get('register', [Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [Auth\RegisteredUserController::class, 'store']);

    Route::get('login', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Auth\AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [Auth\NewPasswordController::class, 'store'])->name('password.store');
});

// 認証関連 認証後
Route::middleware('auth')->group(function () {
    Route::get('verify-email', Auth\EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', Auth\VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')->name('verification.send');

    Route::get('confirm-password', [Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [Auth\ConfirmablePasswordController::class, 'store']);

    Route::put('password', [Auth\PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //管理者向け
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [Admin\DashBoardController::class, 'index'])->name('index');
        // カテゴリ取得用 resourceと順番をいれかえない。 
        Route::get('category/ajax', [Admin\CategoryXhrController::class, 'index']);
        Route::resource('category', Admin\CategoryController::class);
        Route::resource('item', Admin\ItemController::class);
        Route::resource('user', Admin\UserController::class);
    });
});


