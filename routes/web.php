<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Author;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Category;
use App\Http\Controllers\Product;
use App\Http\Controllers\Book;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Order;
use App\Http\Controllers\Producer;
use App\Http\Controllers\Slider;
use App\Http\Controllers\User;
use App\Http\Controllers\Website;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\News;
use App\Http\Middleware;
use App\Http\Kernel;
use App\Http\Controllers\CS_Product;
use App\Http\Controllers\CartController;

use Illuminate\Auth\Middleware\AccessPermission;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'check_role_user']], function () {
    Route::post('/admin', [AdminController::class, 'show_dashboard']);
    Route::get('/admin', [AdminController::class, 'show_dashboard'])->name('show_admin');
    Route::get('/logout', [AdminController::class, 'get_logout'])->name('logout.get');
    Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
    Route::post('/dashboard', [AdminController::class, 'get_login']);

//=======================Category================================
//Add Category
Route::get('/add-category', [Category::class, 'add_category']);
Route::post('/save-category', [Category::class, 'save_category']);

//All Category
Route::get('/all-category', [Category::class, 'all_category']);

//Update Category
Route::get('/edit-category/{CategoryID}', [Category::class, 'edit_category']);
Route::post('/update-category/{CategoryID}', [Category::class, 'update_category']);

//Delete Category
Route::get('/delete-category/{CategoryID}', [Category::class, 'delete_category']);

//Search Category
Route::get('/search-category', [Category::class, 'search_category']);

//================================Author================================
Route::get('/add-author', [Author::class, 'add_author']);
Route::post('/save-author', [Author::class, 'save_author']);

//All Author
Route::get('/all-author', [Author::class, 'all_author']);

//Update Author
Route::get('/edit-author/{AuthorID}', [Author::class, 'edit_author']);
Route::post('/update-author/{AuthorID}', [Author::class, 'update_author']);

//Delete Author
Route::get('/delete-author/{AuthorID}', [Author::class, 'delete_author']);

//Search Author
Route::get('/search-author', [Author::class, 'search_author']);
//================================Producer================================
Route::get('/add-producer', [Producer::class, 'add_producer']);
Route::post('/save-producer', [Producer::class, 'save_producer']);

//All Producer
Route::get('/all-producer', [Producer::class, 'all_producer']);

//Update Producer
Route::get('/edit-producer/{ProducerID}', [Producer::class, 'edit_producer']);
Route::post('/update-producer/{ProducerID}', [Producer::class, 'update_producer']);

//Delete Producer
Route::get('/delete-producer/{ProducerID}', [Producer::class, 'delete_producer']);

//Search Producer
Route::get('/search-producer', [Producer::class, 'search_producer']);
//================================Book================================
//Add Book
Route::get('/add-book', [Book::class, 'add_book']);
Route::post('/save-book', [Book::class, 'save_book']);

//All Book
Route::get('/all-book', [Book::class, 'all_book']);

//Update Book
Route::get('/edit-book/{BookID}', [Book::class, 'edit_book']);
Route::post('/update-book/{BookID}', [Book::class, 'update_book']);

//Delete Book
Route::get('/delete-book/{BookID}', [Book::class, 'delete_book']);

//Search Bookbook
Route::get('/search-book', [Book::class, 'search_book']);

//Save quantity
Route::get('/input-quantity/{BookID}', [Book::class, 'input_quantity']);
Route::post('/save-quantity/{BookID}', [Book::class, 'save_quantity']);

//================================User================================
//Add user
Route::get('/add-user', [User::class, 'add_user']);
Route::post('/save-user', [User::class, 'save_user']);
//All user 
Route::get('/all-user', [User::class, 'all_user']);

//Update user
Route::get('/edit-user/{UserID}', [User::class, 'edit_user']);
Route::post('/update-user/{UserID}', [User::class, 'update_user']);

//Delete user
Route::get('/delete-user/{UserID}', [User::class, 'delete_user']);

//Active user
Route::get('/active-user/{UserID}', [User::class, 'unactive_user']);
Route::get('/unactive-user/{UserID}', [User::class, 'active_user']);

//Search user
Route::get('/search-user', [User::class, 'search_user']);

//==================================Slider==================================
//Add Slider
Route::get('/add-slider', [Slider::class, 'add_slider']);
Route::get('/showactive-slider', [Slider::class, 'showactive_slider']);
Route::post('/save-slider', [Slider::class, 'save_slider']);

//All Slider
Route::get('/all-slider', [Slider::class, 'all_slider']);

//Update Slider
Route::get('/edit-slider/{SliderID}', [Slider::class, 'edit_slider']);
Route::post('/update-slider/{SliderID}', [Slider::class, 'update_slider']);
Route::post('/updateactive-slider', [Slider::class, 'updateactive_slider']);

//Delete Slider
Route::get('/delete-slider/{SliderID}', [Slider::class, 'delete_slider']);

//==================================News==================================
//Add News
Route::get('/add-news', [NewsController::class, 'add_news']);
Route::post('/save-news', [NewsController::class, 'save_news']);

//All News
Route::get('/all-news', [NewsController::class, 'all_news']);

//Update News
Route::get('/edit-news/{NewsID}', [NewsController::class, 'edit_news']);
Route::post('/update-news/{NewsID}', [NewsController::class, 'update_news']);

//Delete News
Route::get('/delete-news/{NewsID}', [NewsController::class, 'delete_news']);

//==================================Order========================================
//All order
Route::get('/all-order', [Order::class, 'all_order']);

//detail order
Route::get('/detail-order/{OrderID}', [Order::class, 'detail_order']);

//print Order
Route::get('/print-order/{OrderID}', [Order::class, 'print_order']);

//search Order
Route::get('/search-order', [Order::class, 'search_order']);

//Delete order
Route::get('/delete-order/{OrderID}', [Order::class, 'delete_order']);

//==================================Customer========================================
//All customer
Route::get('/all-customer', [Customer::class, 'all_customer']);
Route::get('/active-customer/{CustomerID}', [Customer::class, 'unactive_customer']);
Route::get('/unactive-customer/{CustomerID}', [Customer::class, 'active_customer']);
Route::get('/search-customer', [Customer::class, 'search_customer']);
Route::get('/delete-customer/{CustomerID}', [Customer::class, 'delete_customer']);
//==================================Mail========================================
//Add mail
Route::get('/add-mail', [Website::class, 'add_mail']);

Route::post('/post-email', [Website::class, 'index']);

});

// Route::get('/admin', [AdminController::class, 'show_dashboard']);
// Route::post('/admin', [AdminController::class, 'show_dashboard']);




//Product
Route::get('/chi-tiet-san-pham/{ProductID}', [Product::class, 'detail_product']);


//Customer page
Route::get('/collections/all', [CS_Product::class, 'index']);




Route::get('/login', [AdminController::class, 'get_login'])->name('login.get');
Route::post('/login', [AdminController::class, 'post_login'])->name('login.post');
Route::get('/signup', [HomeController::class, 'signup']);
Route::post('/signup', [HomeController::class, 'post_signup']);

// Auth::routes();
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart']);


Route::get('/cart', [CartController::class, 'show_cart']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [AdminController::class, 'get_logout'])->name('logout.get');


Route::get('/news', [News::class, 'show_news']);
Route::get('/news-detail/{NewsID}', [News::class, 'detail_news']);

Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_cart']);


Route::get('/checkout', [CartController::class, 'checkout']);
Route::get('/payment', [CartController::class, 'get_payment']);
Route::post('/payment', [CartController::class, 'post_payment']);
Route::get('/don-hang', [CartController::class, 'show_order']);


Route::get('/gioi-thieu', [HomeController::class, 'gioi_thieu']);
Route::get('/chinh-sach', [HomeController::class, 'chinh_sach']);
Route::get('/lien-he', [HomeController::class, 'lien_he']);


Route::get('/search-bookcs', [HomeController::class, 'search_book']);
Route::get('/filter-bookcs', [HomeController::class, 'filter_book']);

Route::get('ajax-request', 'AjaxController@create');
Route::post('ajax-request', 'AjaxController@store');