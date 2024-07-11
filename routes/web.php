<?php

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

use App\Http\Controllers\ProfileController;



Route::get('/', [ProfileController::class, 'index']);
Route::get('/about', [ProfileController::class, 'about']);
Route::get('/contact', [ProfileController::class, 'contact']);
Route::get('/login', [ProfileController::class, 'login']);
Route::post('/auth', [ProfileController::class, 'auth'])->name('auth');

Route::get('/admin', [ProfileController::class, 'admin']);
Route::get('/admin/about', [ProfileController::class, 'profile']);
Route::get('/admin/contact', [ProfileController::class, 'contactMe']);
Route::get('/admin/footer-link', [ProfileController::class, 'footer']);

Route::post('/admin/store-homepage', [ProfileController::class, 'store_homepage']);
Route::post('/admin/store-footer-link', [ProfileController::class, 'store_footer']);
Route::post('/admin/store-about', [ProfileController::class, 'store_about']);
Route::post('/admin/store-contact', [ProfileController::class, 'store_contact']);


Route::get('/admin/edit-footer/{id}', [ProfileController::class, 'edit_footer']);
Route::get('/admin/edit-contact/{id}', [ProfileController::class, 'edit_contact']);
Route::put('/admin/update-footer/{id}', [ProfileController::class, 'update_footer']);

Route::get('/admin/edit-homepage/{id}', [ProfileController::class, 'edit_homepage']);
Route::put('/admin/update-homepage/{id}', [ProfileController::class, 'update_homepage']);
Route::put('/admin/update-contact/{id}', [ProfileController::class, 'update_contact']);

Route::get('/admin/edit-about/{id}', [ProfileController::class, 'edit_about']);
Route::put('/admin/update-about/{id}', [ProfileController::class, 'update_about']);

Route::delete('/admin/delete-homepage/{id}', [ProfileController::class, 'destroyHomepage'])->name('homepage.destroy');
Route::delete('/admin/delete-about/{id}', [ProfileController::class, 'destroyAbout'])->name('about.destroy');
Route::delete('/admin/delete-contact/{id}', [ProfileController::class, 'destroyContact'])->name('contact.destroy');
Route::delete('/admin/delete-footer/{id}', [ProfileController::class, 'destroy']);
