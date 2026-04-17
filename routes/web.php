<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\DashboardAdminController;

//Route::get('/', function () { 
//  return view('welcome'); 
//}); 

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/welcome', function () {
  return view('welcome');
});
Route::get('/user/{id}', function ($id) {
  return 'User dengan ID ' . $id;
});
// routes/web.php

Route::prefix('admin')->group(function () {
  Route::get('/dashboard', function () {
    return 'Admin Dashboard';
  });

  Route::get('/users', function () {
    return 'Admin Users';
  });
});

// Route::get('/listbarang/{id}/{nama}', function($id, $nama){
//     return view('list_barang', compact('id', 'nama'));
// });

Route::get('/listbarang/{id}/{nama}', [ListBarangController::class, 'tampilkan']);

use App\Http\Controllers\ListEventController;

Route::get('/event', [ListEventController::class, 'index']);

Route::get('/dashboard-admin', [DashboardAdminController::class, 'index']);

use App\Http\Controllers\PengunjungController;

Route::get('/pengunjung', [PengunjungController::class, 'index']);
Route::get('/naya', function () {
    return view('naya');
});