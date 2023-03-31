<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // To make all categories available on the navbar
    public function __construct()
    {
        $this->getAllCategories();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Displaying all the available categories in the admin page
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Displaying create category's form, where admins can create new categories
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validating and storing the new categories
        $this->validate($request, ['name' => 'required']);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect(url('admin/categories'))->with('success', 'A new category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Displaying all books related to the chosen category
        $books = $category->books()->paginate(8);
        $title = 'Among the ' . $category->name . ' category books is: ';
        return view('show-books-category', compact('books', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Displaying the category's edit form
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validating and storing the category
        $this->validate($request, ['name' => 'required']);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect(url('admin/categories'))->with('success', 'The category been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete a specific category
        $category->delete();
        return redirect(url('admin/categories'))->with('toast_info', 'Category deleted!');
    }

    // To make all categories available on the navbar
    public function getAllCategories()
    {
        $categories = Category::all()->sortBy('name');
        view()->share('categories', $categories);
    }

}
