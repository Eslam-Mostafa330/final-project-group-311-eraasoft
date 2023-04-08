<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('admin.books.create', compact('categories', 'publishers', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the inputs entered by the admin
        $this->validate($request, [
            'title' => 'required',
            'isbn' => ['required', 'alpha_num', Rule::unique('books', 'isbn')],
            'cover_image' => 'image|required',
            'category' => 'required',
            'authors' => 'nullable',
            'publisher' => 'required',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $book = new Book;
        // Request all inputs and save it in the database
        $book->title = $request->title;
        $book->cover_image = $this->uploadImage($request->cover_image);
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;
        $book->created_at = Carbon::now();
        $book->save();
        $book->authors()->attach($request->authors);

        // Redirect the user to the page where the added book can be viewed with success message
        return redirect(url("/admin/books/show/$book->id"))->with('success', 'A new book has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('admin.books.edit', compact('book', 'categories', 'publishers', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Validate the inputs entered by the admin
        $this->validate($request, [
            'title' => 'required',
            'cover_image' => 'image',
            'category' => 'required',
            'authors' => 'nullable',
            'publisher' => 'required',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        // Request all inputs and save it in the database
        $book->title = $request->title;
        // Delete the old cover and save the new one if the user updated the cover
        if ($request->has('cover_image')) {
            Storage::disk('public')->delete($book->cover_image);
            $book->cover_image = $this->uploadImage($request->cover_image);
        }
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;

        // Validate the ISBN and make sure that it's unique,
        // because each book must have a unique ISBN.
        if ($book->isDirty('isbn')) {
            $this->validate($request, [
                'isbn' => ['required', 'alpha_num', Rule::unique('books', 'isbn')],
            ]);
        }

        $book->save();
        // Attach the new author
        $book->authors()->detach();
        $book->authors()->attach($request->authors);

        // Redirect the user to the page where the added book can be viewed
        return redirect(url("/admin/books/show/$book->id"))->with('success', 'The book been updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     */
    // Method to delete specific book
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_image);
        $book->delete();
        return redirect(url("/admin/books"))->with('toast_info', 'Book deleted!');;
    }

    public function details(Book $book)
    {
        // Check if the user has already authenticated (logged in), then we will check
        // if he bought the book by changing the value for "findBook" to "1" => "true"
        // to make him able to rate it later
        $findBook = 0;
        if (Auth::check()) {
            $findBook = auth()->user()->allowRating()->where('book_id', $book->id)->first();
        }
        // Displays the book details
        return view('book.details', compact('book', 'findBook'));
    }

    /**
     * Function to handle the book rating
     */
     public function bookRating(Request $request, Book $book)
     {
         if(auth()->user()->rated($book)) {
             $rating = Rating::where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first();
             $rating->value = $request->value;
             $rating->save();
         } else {
             $rating = new Rating;
             $rating->user_id = auth()->user()->id;
             $rating->book_id = $book->id;
             $rating->value = $request->value;
             $rating->save();
         }
         return back();
     }
}
