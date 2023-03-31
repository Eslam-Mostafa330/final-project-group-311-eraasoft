<?php

namespace App\Providers;

use App\Models\Author;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // To make the pagination
        Paginator::useBootstrap();

        // Make the categories, publishers, and authors available
        // on the whole website via the navbar and sorting by their name
        View::composer('*', function ($view) {
            $categories = Category::all()->sortBy('name');
            $publishers = Publisher::all()->sortBy('name');
            $authors = Author::all()->sortBy('name');

            $view->with('categories', $categories);
            $view->with('publishers', $publishers);
            $view->with('authors', $authors);

        });


    }
}
