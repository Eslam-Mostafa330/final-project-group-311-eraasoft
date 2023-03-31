<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterEmail;
use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    // Method to store email addresses of those who have subscribed to the newsletter
    public function newsletterEmailStore(Request $request)
    {
        $this->validate($request, [
            'newsletter_email' => 'required|email'
        ]);

        $subscriber = $request->newsletter_email;
        $guest = new Newsletter;
        $guest->newsletter_email = $request->newsletter_email;
        $guest->created_at = Carbon::now();
        $guest->save();
        // Sending an auto email to those who subscribed to the newsletter
        Mail::to($subscriber)->send(new NewsletterEmail);
        return redirect(url('/'))->with('success', 'We are glad you have joined our newsletter.');
    }

    // Displaying email addresses who have subscribed to the newsletter for admins
    public function showSubscribedEmails()
    {
        $newsletter = Newsletter::orderBy('created_at', 'desc')->get();
        return view('admin.newsletter.newsletter-details', compact('newsletter'));
    }

    // Method for deleting the subscribed email address
    public function deleteSubscribedEmails(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect(url('admin/newsletter/newsletter-details'))->with('toast_info', 'Subscribed Email Deleted');
    }

}
