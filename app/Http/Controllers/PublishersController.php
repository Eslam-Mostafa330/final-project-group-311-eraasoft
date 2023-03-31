<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // To make all publishers available on the navbar
    public function __construct()
    {
        $this->getAllPublishers();
    }

    public function index()
    {
        // Displaying all the available publishers
        $publishers = Publisher::all()->sortBy('name');
        return view('admin.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Displaying create publisher's form, where admins can create new publishers
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validating and storing the new publishers
        $this->validate($request, ['name' => 'required']);
        $publisher = new Publisher;
        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->created_at = Carbon::now();
        $publisher->save();
        return redirect(url('admin/publishers'))->with('success', 'A new publisher has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        // Displaying all books related to the chosen publisher
        $books = $publisher->books()->paginate(8);
        $title = 'The following books are published by ' . $publisher->name . ': ';
        return view('show-books-publishers', compact('books', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        // Displaying the publisher's edit form
        return view('admin.publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        // Validating and storing the publisher
        $this->validate($request, ['name' => 'required']);
        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();
        return redirect(url('admin/publishers'))->with('success', 'The publisher been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        // Delete a specific publisher
        $publisher->delete();
        return redirect(url('admin/publishers'))->with('toast_info', 'Publisher deleted!');
    }

    /**
     * Display all the available publishers through the main page.
     */
    public function main()
    {
        // Displaying all the available publishers
        $publishers = Publisher::all()->sortBy('name');
        $title = 'Publishers';
        return view('publishers.index', compact('publishers', 'title'));
    }

    // To make all publishers available on the navbar
    public function getAllPublishers()
    {
        $publishers = Publisher::all()->sortBy('name');
        view()->share('categories', $publishers);
    }


}
