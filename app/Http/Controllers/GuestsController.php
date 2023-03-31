<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class GuestsController extends Controller

{
    // Method to display the contact form
    public function showContact()
    {
        return view('contact.index');
    }

    // Method to validate and store the messages sent by guests
    public function store(Request $request)
    {
        $this->validate($request, [
            'guest_name'    => 'required|min:3',
            'guest_email'   => 'required|email',
            'guest_message' => 'required'
        ]);
        $guest = new Guest;
        $guest->guest_name    = $request->guest_name;
        $guest->guest_email   = $request->guest_email;
        $guest->guest_message = $request->guest_message;
        $guest->created_at = Carbon::now();
        $guest->save();
        return redirect(url('contact/index'))->with('success', 'Your message has been sent');
    }

    // Method to display all messages on inbox admin page
    public function allMessages()
    {
        $messages = Guest::orderBy('created_at', 'desc')->get();
        return view('admin.inbox.index', compact('messages'));
    }

    // Method to display message details sent by guests
    public function show(Guest $guest)
    {
        return view('admin.inbox.message-details', compact('guest'));
    }

    // Method to delete messages
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect(url('admin/inbox'))->with('toast_info', 'Message deleted!');
    }


}
