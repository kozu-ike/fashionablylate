<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
// ログイン画面
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

// 入力画面
Route::get('/', [ContactController::class, 'index'])->name('index');

// 確認画面
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');

// 最終画面
Route::post('/thanks', [ContactController::class, 'thanks'])->name('thanks');


// 管理ページ
Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin');

// 詳細ページ
Route::get('/admin/details/{id}', [AdminController::class, 'showDetails'])->name('admin.details');

// 検索
Route::post('/admin/search', [AdminController::class, 'search'])->name('admin.search');

// エクスポート
Route::post('/admin/export', [AdminController::class, 'export'])->name('admin.export');

// 詳細ページを表示
Route::get('/admin/contacts/{id}', [AdminController::class, 'show'])->name('admin.contacts.show');

// 削除処理
Route::delete('/admin/contacts/{id}', [AdminController::class, 'destroy'])->name('admin.contacts.destroy');

// カテゴリ操作
Route::resource('categories', CategoryController::class);