<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Guest;
use App\Models\Newsletter;
use App\Models\Publisher;
use App\Models\Shopping;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    // Displaying books, categories, authors, publishers, orders, messages,
    // and newsletter subscription numbers on the dashboard main page.
    public function index()
    {
        $books_number             = Book::count();
        $categories_number        = Category::count();
        $authors_number           = Author::count();
        $publishers_number        = Publisher::count();
        $orders_number            = Shopping::count();
        $messages_number          = Guest::count();
        $newsletter_subscriptions = Newsletter::count();
        return view('admin.index', compact('books_number', 'categories_number', 'authors_number', 'publishers_number', 'orders_number', 'messages_number', 'newsletter_subscriptions'));
    }
}
