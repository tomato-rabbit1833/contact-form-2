<?php

use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// トップページ（お問い合わせフォームを表示）
Route::get('/', [ContactController::class, 'showForm'])->name('top');

// お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

// 確認画面（POST用）
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 🔽 バリデーションエラー時のGETアクセスに備えて追加（重要！）
Route::get('/contact/confirm', function () {
    return redirect()->route('contact.form');
});

// 送信処理（POST）
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// サンクスページ
Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// 認証機能
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 管理画面（認証が必要）
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');
});