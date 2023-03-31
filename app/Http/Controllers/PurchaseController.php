<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shopping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderDetailsMail;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    // "SendMail" method that will receive the order and the user who purchase that order
    // then will send the message to that user who purchases the order, and getting that
    // message content from "OrderDetailsMail"
    public function sendMail($order, $user)
    {
        Mail::to($user->email)->send(new OrderDetailsMail($order, $user));
    }

    public function checkOut(Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        $user_id = auth()->user()->id;
        $books  = User::find($user_id)->booksInCart;
        $total  = 0;
        foreach($books as $book) {
            $total += $book->price * $book->pivot->number_of_copies;
        }
        return view('credit.checkout', compact('total', 'intent'));
    }

    // Method to complete the purchase process, and throw an error if something went wrong
    public function purchase(Request $request)
    {
        $user = $request->user();
        // Getting the input "payment_method" which is the "name" attribute in the checkout page
        $payment_method = $request->input('payment_method');
        // Identify the user and the purchased books, and calculate the total price
        $user_id = auth()->user()->id;
        $books  = User::find($user_id)->booksInCart;
        $total  = 0;
        foreach($books as $book) {
            $total += $book->price * $book->pivot->number_of_copies;
        }

        // Trying to complete the payment method
        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($payment_method);
            $user->charge($total * 100, $payment_method);
            // throw an error if something went wrong
        } catch (\Exception $exception) {
            return back()->with('error', 'An error occurred while purchasing the product, please check the card information', $exception->getMessage());
        }
        foreach($books as $book) {
            $book_price = $book->price;
            $purchase_time = Carbon::now();
            $user->booksInCart()->updateExistingPivot($book->id, ['bought' => TRUE, 'price' => $book_price, 'created_at' => $purchase_time]);
            $book->save();
        }
        // An automatic email will be sent to the authenticated user
        // if the purchase was successful via "SendMail" method
        $this->sendMail($books, auth()->user());
        return redirect(url('/my-products'))->with("success", "Thank you for placing your order. You will receive an email with your order details shortly.");
    }

    // Displaying all purchased books by the user related to their
    public function myProducts()
    {
        $user_id = auth()->user()->id;
        $my_books = User::find($user_id)->purchasedProducts;
        return view('book.my-products', compact('my_books'));
    }

    // Displaying all orders which can be accessed only by admins
    public function displayAllOrders()
    {
        $all_orders = Shopping::with(['user', 'book'])->where('bought', true)->orderBy('created_at', 'desc')->get();
        return view('admin.orders.all-orders', compact('all_orders'));
    }

    // Displaying detailed information about each user's orders
    public function order($id)
    {
        $order = Shopping::findOrFail($id);
        return view('admin.orders.order', compact('order'));
    }

    // Method for deleting orders
    public function delete(Shopping $shopping)
    {
        $shopping->delete();
        return redirect(url('admin/orders/all-orders'))->with('toast_info', 'Order deleted!');
    }

}
