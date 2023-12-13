<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForgotPasswordController;

//use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogarticleController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FAQcategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('dashboard');
// });

// login-signup
Route::get('dashboard',[CustomAuthController::class,'dashboard'])->name('dashboard');
Route::get('login',[CustomAuthController::class,'index'])->name('login');
Route::post('custom-login',[CustomAuthController::class,'customLogin'])->name('login.custom');
Route::get('registration',[CustomAuthController::class,'registration'])->name('registration');
Route::post('custom-registration',[CustomAuthController::class,'customRegistration'])->name('register.custom');
Route::get('signout',[CustomAuthController::class,'signOut'])->name('signout');


// //forget-reset password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



//static reset password
// Route::get('password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');


//myprofile
//Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
// Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
// Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
// Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::put('profile/', [ProfileController::class, 'update'])->name('profile.update');
// Route::post('/profile/remove-image',[ProfileController::class,'removeImage'])->name('removeProfileImage');


Route::resource('profile', ProfileController::class);
Route::post('/profile/remove-image',[ProfileController::class,'removeImage'])->name('removeProfileImage');

Route::get('readFiles', [ProfileController::class, 'readFiles'])->name('readFiles');

Route::resource('blogcategories', BlogcategoryController::class);
Route::resource('blogarticles', BlogarticleController::class);

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/articles/category/{categoryId}', [BlogController::class, 'articlesByCategory'])->name('articlesByCategory');

// Route::resource('faqs', FAQController::class);
Route::get('/faqs', [FAQController::class, 'index'])->name('faqs.index');
Route::get('faqs/create', [FAQController::class, 'create'])->name('faqs.create');
Route::post('faqs', [FAQController::class, 'store'])->name('faqs.store');
Route::get('faqs/{id}/edit', [FAQController::class, 'edit'])->name('faqs.edit');
Route::put('faqs/{id}', [FAQController::class, 'update'])->name('faqs.update');
Route::delete('/faqs/{id}', [FAQController::class,'destroy'])->name('faqs.destroy');

Route::get('/faqscategory', [FAQcategoryController::class, 'index'])->name('faqscategory.index');
Route::get('faqscategory/create', [FAQcategoryController::class, 'create'])->name('faqscategory.create');
Route::post('faqscategory', [FAQcategoryController::class, 'store'])->name('faqscategory.store');
Route::get('faqscategory/{id}/edit', [FAQcategoryController::class, 'edit'])->name('faqscategory.edit');
Route::put('faqscategory/{id}', [FAQcategoryController::class, 'update'])->name('faqscategory.update');
Route::delete('/faqscategory/{id}', [FAQcategoryController::class,'destroy'])->name('faqscategory.destroy');