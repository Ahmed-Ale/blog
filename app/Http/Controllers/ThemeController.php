<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function  index()
    {
        $blogs = Blog::paginate(4);
        return view('theme.index', compact('blogs'));
    }
    public function  contact()
    {
        return view('theme.contact');
    }
    public function  category($name)
    {
        $category = Category::where('name', $name)->first()->id;
        $blogs = Blog::where('category_id', $category)->paginate(8);
        return view('theme.category', compact('blogs', 'name'));
    }
    public function  singleBlog($id)
    {
        $blog = Blog::find($id)->first();
        return view('theme.single-blog',compact('blog'));
    }
}
