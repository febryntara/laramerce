<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewTemplateController;
use App\Mail\OrderMail;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\SnapToken;
use Illuminate\Support\Facades\Route;

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

Route::get('/token', function () {
    $transaction_details =
        [
            "order_id" => "CustOrder-102",
            "gross_amount" => 13000
        ];

    $item_details = [
        [
            "id" => "s8",
            "price" => 2208000,
            "quantity" => 2,
            "name" => "OMS TATTOO"
        ],
        [
            "id" => "s7",
            "price" => 2208000,
            "quantity" => 5,
            "name" => "OMS TATTOO"
        ],
        [
            "id" => "s6",
            "price" => 2208000,
            "quantity" => 1,
            "name" => "OMS TATTOO"
        ],
    ];
    $customer_details = [
        "name" => "Budi Sasono",
        "email" => "budisusanto@example.com",
        "phone" => "+628123456789",
        'country' => 'indonesia',
        'post_code' => '6546532',
    ];

    $shipping_address = [
        "name" => "Budi Sasono",
        "email" => "budisusanto@example.com",
        "phone" => "0812345678910",
        "address" => "Sudirman",
        "city" => "Jakarta",
        "delivery_name" => "JNE",
        "delivery_service" => "OKE",
    ];

    return dump(Order::generate($customer_details, $shipping_address, $item_details, $transaction_details));
});

Route::get('/email', function () {
    return new OrderMail(Order::all()->first());
});
Route::get('/', function () {
    return view('frontpage.main.main', ['title' => 'Homepage | Urban Adventure']);
});

Route::controller(GeneralController::class)->group(function () {
    Route::get('/', 'main')->name('main');
    Route::get('/thankyou', 'thankyou')->name('thankyou')->middleware('auth');
    Route::get('/cart', 'cart')->name('cart')->middleware('auth');
    // Route::get('/category', 'category')->name('category');
    Route::get('/products', 'products')->name('products');
    Route::get('/category/{category:name}', 'category')->name('category');
    Route::get('/brand/{brand:name}', 'brand')->name('brand');
    Route::get('/quickview/{product:product_code}', 'quickview')->name('quickview');
    Route::get('/product/{product:product_code}', 'product_detail')->name('product-detail');
    Route::match(['GET', 'POST'], '/checkout', 'checkout')->name('checkout')->middleware('auth');
    Route::post('/execute-order', 'execute_order')->name('execute_order')->middleware('auth');
    Route::get('/order/{order}', 'order_detail')->name('order_detail')->middleware('auth');
    Route::get('/blog-detail', 'blog_detail')->name('blog-detail');
    Route::get('/blog-page', 'blog')->name('blog');
    Route::get('/order-history', 'order_history')->name('order-history')->middleware('auth');
    Route::get('/my-account', 'my_account')->name('my-account')->middleware('auth');
    Route::get('/wishlist', 'wishlist')->name('wishlist')->middleware('auth');
});

Route::get('/test', function () {
    return "oke";
});

Route::controller(ViewTemplateController::class)->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.admin.main-dashboard', ['title' => 'Dashboard | Urban Adventure']);
    })->name('dashboard')->middleware(['auth', 'admin']);
});

Route::middleware(['auth', 'admin'])->controller(CategoryController::class)->group(function () {
    Route::get('/dashboard/categories', 'allCategory')->name('manage_category.all');
    Route::get('/dashboard/category/create', 'createCategory')->name('manage_category.create');
    Route::post('/dashboard/category/create', 'storeCategory')->name('manage_category.store');
    Route::get('/dashboard/category/{category:id}', 'detailCategory')->name('manage_category.detail');
    Route::get('/dashboard/category/{category:id}/update', 'updateCategory')->name('manage_category.update');
    Route::patch('/dashboard/category/{category:id}', 'patchCategory')->name('manage_category.patch');
    Route::delete('/dashboard/category/{category:id}/delete', 'deleteCategory')->name('manage_category.delete');
});

Route::middleware('auth')->controller(OrderController::class)->group(function () {
    Route::get('/dashboard/orders', 'allOrder')->name('manage_order.all')->middleware(['auth', 'admin']);
    Route::get('/dashboard/order/create', 'createOrder')->name('manage_order.create')->middleware(['auth', 'admin']);
    Route::get('/dashboard/order/report-pdf', 'reportPDF')->name('manage_order.pdf')->middleware(['auth', 'admin']);
    Route::get('/dashboard/order/report-excel', 'reportExcel')->name('manage_order.excel')->middleware(['auth', 'admin']);
});

Route::middleware(['auth', 'admin'])->controller(ProductController::class)->group(function () {
    // products
    Route::get('/dashboard/products', 'allProduct')->name('manage_product.all');
    Route::get('/dashboard/product/create', 'createProduct')->name('manage_product.create');
    Route::post('/dashboard/product/create', 'storeProduct')->name('manage_product.store');
    Route::get('/dashboard/product/{product:product_code}', 'detailProduct')->name('manage_product.detail');
    Route::get('/dashboard/product/{product:product_code}/update', 'updateProduct')->name('manage_product.update');
    Route::patch('/dashboard/product/{product:product_code}', 'patchProduct')->name('manage_product.patch');
    Route::delete('/dashboard/product/{product:product_code}', 'deleteProduct')->name('manage_product.delete');

    // best deals
    Route::get("/dashboard/best-deals", 'allBestDeal')->name("manage_best_deal.all");
    Route::get("/dashboard/best-deals/create", 'createBestDeal')->name("manage_best_deal.create");
    Route::post("/dashboard/best-deals/create", 'storeBestDeal')->name("manage_best_deal.store");
    Route::delete("/dashboard/best-deals/{product:product_code}/delete", 'deleteBestDeal')->name("manage_best_deal.delete");
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard/users', 'allUser')->name('manage_user.all')->middleware(['auth', 'admin']);
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'attemptLogin')->name('attempt_login')->middleware('guest');
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'attemptRegister')->name('attempt_register')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::get('/dashboard/profile/detail/{user:email}', 'detailProfile')->name('profile.detail')->middleware(['auth', 'admin']);
    Route::get('/dashboard/profile/update/{user:email}', 'updateProfile')->name('profile.update')->middleware(['auth', 'admin']);
    Route::patch('/dashboard/profile/{user:email}', 'patchProfile')->name('profile.patch')->middleware(['auth', 'admin']);
    Route::delete('/dashboard/user/{user:email}', 'deleteUser')->name('manage_user.delete')->middleware(['auth', 'admin']);
});
Route::controller(BrandController::class)->group(function () {
    Route::get('/dashboard/brand', 'allBrand')->name('manage_brand.all')->middleware(['auth', 'admin']);
    Route::get('/dashboard/brand/create', 'createBrand')->name('manage_brand.create')->middleware(['auth', 'admin']);
    Route::post('/dashboard/brand/create', 'storebrand')->name('manage_brand.store')->middleware(['auth', 'admin']);
    Route::get('/dashboard/brand/{brand:brand_code}', 'detailBrand')->name('manage_brand.detail')->middleware(['auth', 'admin']);
    Route::get('/dashboard/brand/{brand:brand_code}/update', 'updateBrand')->name('manage_brand.update')->middleware(['auth', 'admin']);
    Route::patch('/dashboard/brand/{brand:brand_code}/update', 'patchBrand')->name('manage_brand.patch')->middleware(['auth', 'admin']);
    Route::delete('/dashboard/brand/{brand:brand_code}/delete', 'deleteBrand')->name('manage_brand.delete')->middleware(['auth', 'admin']);
});

Route::controller(CartController::class)->group(function () {
    Route::get('/dashboard/carts', 'allCart')->name('manage_cart.all')->middleware(['auth', 'admin']);
});

Route::controller(BannerController::class)->group(function () {
    Route::get('/dashboard/banners', 'allBanner')->name('manage_banner.all')->middleware(['auth', 'admin']);
    Route::get('/dashboard/banner/create', 'createBanner')->name('manage_banner.create')->middleware(['auth', 'admin']);
    Route::post('/dashboard/banner/create', 'storeBanner')->name('manage_banner.store')->middleware(['auth', 'admin']);
    Route::get('/dashboard/banner/{banner:id}/detail', 'detailBanner')->name('manage_banner.detail')->middleware(['auth', 'admin']);
    Route::delete('/dashboard/banner/{banner:id}/delete', 'deleteBanner')->name('manage_banner.delete')->middleware(['auth', 'admin']);
});