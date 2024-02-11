<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthorizeBlogOwner;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public  function __construct()
    {
        $this->middleware('blog.owner')->only(["edit", "update", "destroy"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('theme.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // dd($request->all());

        $blog = $request->validated();

        $image = $request->image;

        $imgName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs('blogs', $imgName, 'public');

        $blog['image'] = $imgName;
        $blog['user_id'] = Auth::user()->id;

        Blog::create($blog);

        return back()->with('blogSuccess', 'Blog Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }


    public function myBlogs()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $blogs = Blog::where('user_id', $id)->paginate(6);
            return view('theme.myBlogs', compact('blogs'));
        }
        abort(403);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('theme.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // dd($request->all());

        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete("public/blogs/$blog->image");

            $image = $request->image;
            $imgName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('blogs', $imgName, 'public');
            $data['image'] = $imgName;
        }

        $blog->update($data);

        return back()->with('blogUpdateSuccess', 'Blog Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::delete("public/blogs/$blog->image");
        $blog->delete();

        return back()->with('blogDeleteSuccess', "Blog Deleted Successfully!");
    }
}
