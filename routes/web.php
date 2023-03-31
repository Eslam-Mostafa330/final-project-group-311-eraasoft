<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsersController;
use App\Mail\OrderDetailsMail;
use App\Models\Book;
use Illuminate\Routing\RouteGroup;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Mail;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

        ############## Home Routes #############
Route::get('/', [SiteController::class, "index"])->name('site.index');
// Route to search method
Route::get('/search', [SiteController::class, "search"])->name('search');
// Route to book details, which can be accessed through the homepage
Route::get('/book/details/{book}', [BooksController::class, "details"]);
// Route to about page
Route::get('/about', [SiteController::class, 'about']);



        ############## Delivery Information Routes `protected by auth` #############
Route::middleware(['auth'])->group(function() {
    // Route to delivery information form page
    Route::get('/profile/delivery-info', [UsersController::class, "show"])->name('profile.delivery-info');
    // Route to store the delivery information
    Route::post('/profile/delivery-info/store', [UsersController::class, "store"]);
});


// Route to rating book
Route::post('/book/details/{book}/rate', [BooksController::class, 'bookRating'])->name('book.rate');

        ############# Categories Route which can be accessed through the main page ##########
// A Route that displays all books related to the chosen category
Route::get('show-books-category/{category}', [CategoriesController::class, "show"])->name('show-books-category');

        ############# Publishers Routes which can be accessed through the main page ###########
// A Route that displays all books related to the chosen publisher
Route::get('show-books-publisher/{publisher}', [PublishersController::class, "show"])->name('show-books-publisher');

        ############## Authors Routes which can be accessed through the main page #############
// A Route that displays all books related to the chosen author
Route::get('show-books-authors/{author}', [AuthorsController::class, "show"])->name('show-books-authors');

        ############## Contact Us Route which can be accessed through the main page ###########
// Route to display the contact us form
Route::get('contact/index', [GuestsController::class, "showContact"]);
// Route to store the messages sent by guests
Route::post('/contact/index/store', [GuestsController::class, "store"]);

// Route to store newsletter email
Route::post('/main/store', [NewsletterController::class, "newsletterEmailStore"]);

                    ############## Admin Routes ##############
                    ##########################################
Route::group(['prefix' => 'admin', 'middleware' => 'can:admin_page'], function () {
    Route::get('/', [AdminsController::class, "index"])->name('admin.index');
    // Routes to display, create, edit, update, store and delete books through the admin page
    Route::get('/books', [BooksController::class, "index"]);
    Route::get('/books/create', [BooksController::class, "create"]);
    Route::post('/books/store', [BooksController::class, "store"]);
    Route::get('/books/show/{book}', [BooksController::class, "show"]);
    Route::get('/books/edit/{book}', [BooksController::class, "edit"]);
    Route::post('/books/update/{book}', [BooksController::class, "update"]);
    Route::post('/books/{book}', [BooksController::class, "destroy"])->name('books.delete');

    // Route to the all-orders page, which includes all orders made by users
    Route::get('/orders/all-orders', [PurchaseController::class, 'displayAllOrders']);
    // Route to order page, which includes detailed order information for each user
    Route::get('/orders/order/{id}', [PurchaseController::class, "order"]);
    Route::post('/orders/order/{shopping}', [PurchaseController::class, "delete"]);

    // Routes to display, create, edit, update, store and delete categories through the admin page
    Route::get('categories/', [CategoriesController::class, "index"]);
    Route::get('/categories/create', [CategoriesController::class, "create"]);
    Route::get('/categories/edit/{category}', [CategoriesController::class, "edit"]);
    Route::post('/categories/store', [CategoriesController::class, "store"]);
    Route::post('/categories/update/{category}', [CategoriesController::class, "update"]);
    Route::post('/categories/{category}', [CategoriesController::class, "destroy"])->name('categories.delete');

    // Routes to display, create, edit, update, store and delete publishers through the admin page
    Route::get('publishers/', [PublishersController::class, "index"]);
    Route::get('/publishers/create', [PublishersController::class, "create"]);
    Route::get('/publishers/edit/{publisher}', [PublishersController::class, "edit"]);
    Route::post('/publishers/store', [PublishersController::class, "store"]);
    Route::post('/publishers/update/{publisher}', [PublishersController::class, "update"]);
    Route::post('/publishers/{publisher}', [PublishersController::class, "destroy"])->name('publishers.delete');

    // Routes to display, create, edit, update, store and delete authors through the admin page
    Route::get('authors/', [AuthorsController::class, "index"]);
    Route::get('/authors/create', [AuthorsController::class, "create"]);
    Route::get('/authors/edit/{author}', [AuthorsController::class, "edit"]);
    Route::post('/authors/store', [AuthorsController::class, "store"]);
    Route::post('/authors/update/{author}', [AuthorsController::class, "update"]);
    Route::post('/authors/{author}', [AuthorsController::class, "destroy"])->name('authors.delete');

    // Route to display all messages sent by guests on inbox admin page
    Route::get('inbox/', [GuestsController::class, "allMessages"]);
    // Route to display message details
    Route::get('inbox/message-details/{guest}', [GuestsController::class, "show"]);
    // Route to delete message
    Route::post('inbox/delete/{guest}', [GuestsController::class, "destroy"])->name('inbox.delete');

    // Route to displaying who has subscribed to newsletter
    Route::get('/newsletter/newsletter-details', [NewsletterController::class, "showSubscribedEmails"]);
    // Route for deleting the subscribed email address
    Route::post('/newsletter/newsletter-details/{newsletter}', [NewsletterController::class, "deleteSubscribedEmails"]);
});

            ############## Cart Routes #############
// Routes to cart controller/page which allows users to add,view,remove, and destroy his cart
Route::post('/cart', [CartController::class, "addToCart"])->name('cart.add');
Route::get('/cart', [CartController::class, "cartView"])->name('cart.view');
Route::post('/remove/{book}', [CartController::class, "remove"])->name('cart.remove');
Route::post('/destroy/{book}', [CartController::class, "destroy"])->name('cart.destroy');

// Route to credit/checkout page, where users can pay for their selected items by credit card
Route::get('/checkout', [PurchaseController::class, "checkOut"])->name('credit.checkout');

// Route to store the purchased books data, such as purchased item, price, time of purchases,
// number of copies, and which user has purchased it
Route::post('/checkout', [PurchaseController::class, 'purchase'])->name('products.purchase');

// Route to 'my-products page' where users can display all their purchased books
Route::get('/my-products', [PurchaseController::class, "myProducts"])->name('my-products');

