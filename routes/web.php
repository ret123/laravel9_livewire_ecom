<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\ProductComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishListComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home.index');

Route::get('/shop',ShopComponent::class)->name('shop.index');
Route::get('/cart',CartComponent::class)->name('shop.cart');
Route::get('/checkout',CheckoutComponent::class)->name('shop.checkout');

Route::get('/product/{slug}',ProductComponent::class)->name('product.details');

Route::get('/product-category/{slug}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/wishlist',WishListComponent::class)->name('shop.wishlist');

Route::middleware(['auth'])->group(function() {
    Route::get('/user/dashboard',UserDashboard::class)->name('user.dashboard');
});

Route::middleware(['auth','authadmin'])->group(function() {
    Route::get('/admin/dashboard',AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/create',AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}',AdminEditCategoryComponent::class)->name('admin.category.edit');

    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');

    Route::get('/admin/products/create',AdminAddProductComponent::class)->name('admin.product.add');

    Route::get('/admin/products/edit/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
   
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.home.slider');

    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.home.slider.add');

    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.home.slider.edit');
    
    
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
