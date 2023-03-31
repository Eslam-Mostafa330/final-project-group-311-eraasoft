<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // Validate and store the delivery information which related to the authenticated user
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'notes' => 'nullable',
        ]);
        $user = Auth::user();
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->notes = $request->notes;
        $user->save();
        return redirect(url('/profile/delivery-info'))->with('success', 'Your information has been saved successfully!');

    }

    /**
     * Display the specified resource.
     */
    // Displaying the delivery information for the user
    public function show()
    {
        $user = Auth::user();
        return view('profile.delivery-info', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
