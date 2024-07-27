<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\NhacsiController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Auth;
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
// Route::method($uri, $callback);
// method: get, post, put, patch, delete
Route::get('/', function () {
     return view('welcome'); // hiển thị view
    // return "Hello World!"; // Hiển thị chuỗi
    // return ['phở bò', 'cơm rang'];// Hiển thị mảng
//    return response()->json([
//        'name' => 'Vũ Thị Thúy',
//        'email' => 'Thuyvt66@fpt.edu.vn'
//    ]); // Hiển thị dạng object json
})->name('welcome');
// Route::post('/hello', function() {
//     return 'hello';
// });
//  ngoài ra còn có 2 phương thức được ử dụng trong trường hợp method chung uri
// Route::match(['get', 'post'], '/', function(){
//     return 'hello';
// });
Route::get('/user/{id}/{name?}', function(string $id, string $name = null) {
    echo route('welcome') . "<br>";
    return 'User id: '. $id . ' -Name: '.$name;
})
// ->where('id', '[0-9]+');
->where([
    'id' => '[0-9]+',
    'name' => '[a-zA-Z0-9]+'
]); // Ràng buộc 2 tham số

// DAY02
// Khai báo route
Route::get('/san-pham', [SanPhamController::class, 'index'])->name('san-pham.index');
// Tạo controller: php artisan make:controller SanPhamController

Route::get('/san-pham/{id}', [SanPhamController::class, 'detail']);
Route::get('/san-pham/xoa/{id}', [SanPhamController::class, 'delete']);

// Nhac si
Route::get('/nhacsi', [NhacsiController::class, 'index'])->name('nhacsi.index');
Route::get('/nhacsi/create', [NhacsiController::class, 'create'])->name('nhacsi.create');
Route::get('/nhacsi/{id}/edit', [NhacsiController::class, 'edit'])->name('nhacsi.edit');
Route::get('/nhacsi/{id}/show', [NhacsiController::class, 'show'])->name('nhacsi.show');
Route::post('/nhacsi/store', [NhacsiController::class, 'store'])->name('nhacsi.store');
Route::put('/nhacsi/{id}/update', [NhacsiController::class, 'update'])->name('nhacsi.update');
Route::delete('/nhacsi/{id}', [NhacsiController::class, 'destroy'])->name('nhacsi.destroy');

// Route resource
Route::resource('books', BookController::class)
    ->middleware(['auth', 'verified']);

// Đăng ký
//Route::get('auth/register', [RegisterController::class, 'index'])
//    ->name('register');
//Route::post('auth/register', [RegisterController::class, 'register'])
//    ->name('register');
//
//Route::get('auth/verify/{token}', [LoginController::class, 'verify'])
//    ->name('verifyEmail');
//Route::get('auth/login', [LoginController::class, 'index'])
//    ->name('login');
//Route::post('auth/login', [LoginController::class, 'login'])
//    ->name('login');
//Route::get('auth/logout', [LoginController::class, 'logout'])
//    ->name('logout');

//Route::get('/admin', function () {
//    return "Đây là admin";
//})->middleware(CheckAdminMiddleWare::class);
//Route::get('/admin', function () {
//    return "Đây là admin";
//})->middleware(['author', 'isAdmin']);
Route::get('/admin', function () {
    return "Đây là admin";
})->middleware('isAdmin');

Auth::routes([
    'verify' => true,
//    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
