<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;

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
    // return view('welcome'); // hiển thị view
    // return "Hello World!"; // Hiển thị chuỗi
    // return ['phở bò', 'cơm rang'];// Hiển thị mảng
    return response()->json([
        'name' => 'Vũ Thị Thúy',
        'email' => 'Thuyvt66@fpt.edu.vn'
    ]); // Hiển thị dạng object json
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