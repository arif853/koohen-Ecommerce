<?php

use App\Http\Controllers\Admin\FeatureCategoryController;
use App\Models\Feature_category;
use App\Models\Products;
use App\Livewire\CartComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ShopComponent;
use App\Livewire\ProductComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\PostOfficeSelector;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VarientController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomerAuthController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\TrackorderController;
use Illuminate\Routing\Router;

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
Route::get('/cache_clear',function(){
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});

Route::get('/storage',function(){
    Artisan::call('storage:link');
});

// Frontend Route Start

Route::get('/404', function () {
    return view('frontend.404');
});

Route::get('/dashboard/404', function () {
    return view('admin.error.404');
});

// Route::get('/', HomeComponent::class )->name('home');
// Route::get('/product/{slug}', ProductComponent::class)->name('product.detail');

Route::get('/shop', ShopComponent::class )->name('shop');
// Route::get('/cart', CartComponent::class )->name('shop.cart');

// Route::get('/checkout', CheckoutComponent::class )->name('checkout');
// Route::livewire('/postoffice-selector', PostOfficeSelector::class);

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/aboutus', 'aboutus')->name('aboutus');
    Route::get('/contactus', 'contactus')->name('contactus');
    Route::get('/products/{slug}', 'products')->name('product.detail');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/cart', 'cart')->name('cart');
});

// Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::post('/customer/registration', [CustomerAuthController::class, 'registration'])->name('customer.registration');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');

//store checkout orders.
Route::post('/customer/shop/checkout/store', [CheckoutController::class, 'store'])->name('order.store');
Route::post('/customer/shop/checkout/login', [CheckoutController::class, 'login'])->name('checkout.login');

// Customer authentication routes
Route::group(['prefix' => 'customer', 'middleware' => ['auth:customer']], function () {
    Route::get('/dashboard',[CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::post('/customer_update/{id}',[CustomerDashboardController::class, 'customer_update'])->name('customer.update');
    Route::post('/customer_billing_update/{id}', [CustomerDashboardController::class, 'customerBillingUpdate']);
    Route::post('shipping_update/{id}', [CustomerDashboardController::class, 'shipping_update'])->name('customer.shipping_update');
    Route::post('/customerAuth_update/{id}', [CustomerDashboardController::class, 'customerAuth_update']);
    Route::post('/userNameUpdate/{id}', [CustomerDashboardController::class, 'userNameUpdate']);
    Route::post('/newShipping', [CustomerDashboardController::class, 'newShipping']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
});

// Cart controller
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/addtocart/{id}','addtocart')->name('add.cart');
    Route::get('/qtyup/{id}','increaseQuantity')->name('qtyup.cart');
    Route::get('/qtydown/{id}','decreaseQuantity')->name('qtydown.cart');
    Route::get('/removecart/{id}', 'removecart')->name('remove.cart');
    // Route::get('/checkout', 'checkout')->name('checkout');
});

// Track order controller
Route::controller(TrackorderController::class)->group(function () {
    Route::get('/trackorder', 'index')->name('trackorder');
    Route::post('/trackorder/order_details', 'order_details')->name('order_details');

});

// Frontend Route End





// =================================++++++++++++++++++++++++++++++++++++++++++++++++++++++++===================================== //

// Backend Route Start

//dashboard
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Brands
Route::controller(BrandController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/brands', 'index')->name('brands.index');
    Route::get('/dashboard/brands/create', 'create')->name('brands.create');
    Route::post('/dashboard/brands/store', 'store')->name('brands.store');
    Route::get('/dashboard/brands/edit', 'edit')->name('brands.edit');
    Route::post('/dashboard/brands/update', 'update')->name('brands.update');
    Route::delete('/dashboard/brands/destroy/{id}', 'destroy')->name('brands.destroy');

});

//Category
Route::controller(CategoryController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/category', 'index')->name('category.index');
    Route::get('/dashboard/category/create', 'create')->name('category.create');
    Route::post('/dashboard/category/store', 'store')->name('category.store');
    Route::get('/dashboard/category/edit', 'edit')->name('category.edit');
    Route::post('/dashboard/category/update', 'update')->name('category.update');
    Route::delete('/dashboard/category/destroy/{id}', 'destroy')->name('category.destroy');

});

//SubCategory
Route::controller(SubcategoryController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/subcategory', 'index')->name('subcategory.index');
    Route::get('/dashboard/subcategory/create', 'create')->name('subcategory.create');
    Route::post('/dashboard/subcategory/store', 'store')->name('subcategory.store');
    Route::get('/dashboard/subcategory/edit', 'edit')->name('subcategory.edit');
    Route::post('/dashboard/subcategory/update', 'update')->name('subcategory.update');
    Route::delete('/dashboard/subcategory/destroy/{id}', 'destroy')->name('subcategory.destroy');

    Route::get('/dashboard/subcategory/get_subcategory/{id}', 'get_subcategory')->name('category.subcategory');

});


//Varient
Route::controller(VarientController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/varient', 'index')->name('varient.index');
    //color
    Route::post('/dashboard/varient/color_store', 'color_store')->name('color.store');
    Route::get('/dashboard/varient/color_edit', 'color_edit')->name('color.edit');
    Route::post('/dashboard/varient/color_update', 'color_update')->name('color.update');
    Route::delete('/dashboard/varient/color_destroy/{id}', 'color_destroy')->name('color.destroy');
    //size
    Route::post('/dashboard/varient/size_store', 'size_store')->name('size.store');
    Route::get('/dashboard/varient/size_edit', 'size_edit')->name('size.edit');
    Route::post('/dashboard/varient/size_update', 'size_update')->name('size.update');
    Route::delete('/dashboard/varient/size_destroy/{id}', 'size_destroy')->name('size.destroy');

});

// Products
Route::controller(ProductController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/products', 'index')->name('products.index');
    Route::get('/dashboard/products/create', 'create')->name('products.create');
    Route::post('/dashboard/products/store', 'store')->name('products.store');
    Route::get('/dashboard/products/edit/{id}', 'edit')->name('products.edit');
    Route::patch('/dashboard/products/update/{id}', 'update')->name('products.update');
    Route::delete('/dashboard/products/destroy/{id}', 'destroy')->name('products.destroy');
    Route::delete('/dashboard/products/image_destroy/{id}', 'image_destroy')->name('productsimage.destroy');

    Route::get('/dashboard/products/{slug}', 'show')->name('products.show');

});

//Order
Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/orders', 'index')->name('order.index');
    Route::get('/dashboard/orders/pending_order', 'pending_order')->name('order.pending');
    Route::get('/dashboard/orders/completed_order', 'completed_order')->name('order.completed');
    Route::get('/dashboard/orders/orders_track', 'order_track')->name('order.track');
    Route::get('/dashboard/orders/orders_details', 'order_details')->name('order.details');
    Route::get('/dashboard/orders/orders_return', 'order_return')->name('order.return');
    Route::post('/update-order-status', 'updateOrderStatus');
    Route::post('/update-one-order-status', 'updateOneOrderStatus');

    // Route::get('/dashboard/category/create', 'create')->name('category.create');
});

//Customer
Route::controller(CustomerController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/customers', 'index')->name('customer.index');
    Route::get('/dashboard/customers/create_customer', 'create')->name('customer.create');
    Route::get('/dashboard/customers/Customer_profile', 'customer_details')->name('customer.profile');
    // Route::get('/dashboard/category/create', 'create')->name('category.create');
});

//offers
Route::controller(OfferController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/promotion/offers', 'index')->name('offers.index');
    // Route::get('/dashboard/customers/create_customer', 'create')->name('customer.create');
    // Route::get('/dashboard/customers/Customer_profile', 'customer_details')->name('customer.profile');
    // Route::get('/dashboard/category/create', 'create')->name('category.create');
});

//Coupons
Route::controller(CouponController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/promotion/coupons', 'index')->name('coupon.index');
    Route::get('/dashboard/promotion/coupons/create', 'create')->name('coupon.create');
    // Route::get('/dashboard/customers/Customer_profile', 'customer_details')->name('customer.profile');
    // Route::get('/dashboard/category/create', 'create')->name('category.create');
});

//Media
Route::controller(MediaController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/media', 'index')->name('media.index');
    Route::get('/dashboard/media/create', 'create')->name('media.create');
    // Route::get('/dashboard/customers/Customer_profile', 'customer_details')->name('customer.profile');
    // Route::get('/dashboard/category/create', 'create')->name('category.create');

});

//supplier
Route::controller(SupplierController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/supplier', 'index')->name('supplier.index');
    Route::post('/dashboard/supplier/store', 'store')->name('supplier.store');
    Route::get('/dashboard/supplier/edit', 'edit')->name('supplier.edit');
    Route::post('/dashboard/supplier/update', 'update')->name('supplier.update');
    Route::delete('/dashboard/supplier/destroy', 'destroy')->name('supplier.destroy');

});

//Zone
Route::controller(ZoneController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/zone', 'index')->name('zone.index');
    Route::post('/dashboard/zone/store', 'store')->name('zone.store');
    Route::match(['get', 'post'], '/dashboard/zone/status_update/{id}', 'status_update')->name('zonestatus.update');
    Route::delete('/dashboard/zone/destroy', 'destroy')->name('zone.destroy');
});


//Feature category
Route::controller(FeatureCategoryController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/category_feature', 'index')->name('category_feature');
    Route::post('/dashboard/category_feature/store', 'store')->name('category_feature.store');
    Route::get('/dashboard/category_feature/edit', 'edit')->name('category_feature.edit');
    Route::post('/dashboard/category_feature/update', 'update')->name('category_feature.update');
    // Route::match(['get', 'post'], '/dashboard/zone/status_update/{id}', 'status_update')->name('zonestatus.update');
    Route::delete('/dashboard/category_feature/destroy', 'destroy')->name('category_feature.destroy');
});


// reviews
Route::get('/dashboard/reviews', function () {
    return view('admin.reviews.index');
})->name('reviews');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
