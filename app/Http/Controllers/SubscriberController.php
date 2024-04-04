<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $subscriber = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create($subscriber);
        return back()->with('status', 'Subscribed Successfully!');
    }
}
