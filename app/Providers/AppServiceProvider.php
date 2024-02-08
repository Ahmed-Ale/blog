<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

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
        $categories = Category::get();
        $headerCategories = Category::take(2)->get();

        $blogs = Blog::paginate(4);

        view()->share([
            'categories' => $categories,
            'headerCategories' => $headerCategories,
            'blogs' => $blogs,
        ]);
    }
}
