<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // Displaying all books on the main homepage
    public function index()
    {
        $books = Book::paginate(8);
        $title = 'Discover our newest books';
        return view('site', compact('books', 'title'));
    }

    // Search method that returns all results related to the requested search
    public function search(Request $request)
    {
        $books = Book::where('title', 'like', "%{$request->search}%")->paginate(8);
        $title = 'Search result for ' . $request->search . ' is: ';
        return view('show-search-result', compact('books', 'title'));
    }

    // Displaying about page
    public function about()
    {
        return view('about');
    }
}
