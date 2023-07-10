<?php

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
//use Illuminate\Support\Facades\Route;


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

Route::get('/dashboard', function () {
    return view('posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/',[PostController::class,'index'])->name('post');
    Route::get('/cards',[PostController::class,'cards'])->name('cards');
    //url,an array of[ controllername , method]
    Route::resource('categories',CategoryController::class); //->only([])   except([])

    Route::resource('brands',BrandController::class);
    Route::get('products/trash',[ProductController::class,'trash'])->name('products.trash');
    Route::get('products/restore{id}',[ProductController::class,'restore'])->name('products.restore');
    Route::delete('products/forceDelete{id}',[ProductController::class,'forceDelete'])->name('products.forceDelete');

    Route::get('users/export', [UserController::class, 'export'])->name('users.export');
    Route::post('users/import', [UserController::class, 'import'])->name('users.import');

    Route::resource('products',ProductController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::get('/sendemail',function(){
        Mail::to('moha6.afoori@gmail.com')->send(new TestEmail(['title'=>'LaravelCourse','name'=>auth()->user()->name]));
        return '<h1>email sent</h1>';
    });

   
    Route::get('/changeLang/{lang}',function (string $locale)
    {
        if(! in_array($locale,['en','ar'])){
            abort(400);
        }
        App::setLocale($locale);
        session()->put('locale',$locale);
        return redirect()->back();
    })->name('changeLang');


});

require __DIR__.'/auth.php';
