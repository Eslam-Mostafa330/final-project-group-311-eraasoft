<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    // To make all author available on the navbar
    public function __construct()
    {
        $this->getAllAuthors();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Displaying all the available authors
        $authors = Author::all()->sortBy('created_at');
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Displaying create author's form, to allow the admins to create new authors
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validating and storing the new authors
        $this->validate($request, ['name' => 'required']);
        $author = new Author;
        $author->name = $request->name;
        $author->description = $request->description;
        $author->created_at = Carbon::now();
        $author->save();
        return redirect(url('admin/authors'))->with('success', 'A new author has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        // Displaying all books related to the chosen author
        $books = $author->books()->paginate(8);
        $title = 'Among the books of the author, ' . $author->name . ' is: ';
        return view('show-books-authors', compact('books', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        // Displaying the author's edit form
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        // Validating and storing the author
        $this->validate($request, ['name' => 'required']);
        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();
        return redirect(url('admin/authors'))->with('success', 'The author been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        // Delete a specific author
        $author->delete();
        return redirect(url('admin/authors'))->with('toast_info', 'Author deleted!');
    }

    // To make all author available on the navbar
    public function getAllAuthors()
    {
        $authors = Author::all()->sortBy('name');
        view()->share('authors', $authors);
    }
}
