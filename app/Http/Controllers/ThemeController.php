<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function  index()
    {
        return view('theme.index');
    }
    public function  contact()
    {
        return view('theme.contact');
    }
    public function  category()
    {
        return view('theme.category');
    }
}