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
        $categories = Category::whereHas('blogs')->withCount('blogs')->get();
        $recentBlogs = Blog::with('user')->with('category')->latest()->take(6)->get();
        view()->share([
            'categories' => $categories,
            'recentSidebarBlogs' => $recentBlogs->take(3),
            'recentSliderBlogs' => $recentBlogs,
        ]);
    }
}
