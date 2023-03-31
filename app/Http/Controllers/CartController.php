<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request)
    {
        // A function to find the book which added by the user,
        // then ensure that it's available in stock, and return a message if not,
        // then if it is in stock, the "number_of_copies" will be updated using..
        // "updateExistingPivot" method with the quantity which has been chosen by the user
        $book = Book::find($request->id); // Find the user's requested book.
        // Check if the authenticated user has the requested book in his cart or not
        if(auth()->user()->booksInCart->contains($book)) {
            // Checking if the requested book exists on user's cart, will add the new quantity to the old one
            $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
            // Checking if the new quantity exceeds the stock available,
            // then throwing an error if it does using sweet alert, and redirect user back
            if($newQuantity > $book->number_of_copies) {
                return redirect()->back()->with('error', "Book not add!, The maximum number you can purchase from this book is: " . ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies) ." book");
            }else{
                // if the user doesn't exceed the stock available,
                // will update the number of copies field with the new quantity.
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $newQuantity]);
            }
        }else{
            // If the authenticated user has not had the requested book in his cart, will request their quantity
            auth()->user()->booksInCart()->attach($request->id, ['number_of_copies'=> $request->quantity]);
        }
        // Return response to AJAX with the number of books for the cart of the authenticated user
        $number_of_product = auth()->user()->booksInCart()->count();
        return response()->json(['number_of_product' => $number_of_product]);
    }

    // A method to display the books that the user has added to the cart on the cart page
    public function cartView()
    {
        $books = auth()->user()->booksInCart;
        return view('cart', compact('books'));
    }

    // A method allows to user to remove an item from his cart
    public function remove(Book $book)
    {
        $oldQuantity = auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
        if($oldQuantity > 1) {
            auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => -- $oldQuantity]);
        } else {
            auth()->user()->booksInCart()->detach($book->id);
        }
        return redirect(url('cart'))->with('toast_info', 'Book Removed!');
    }

}
