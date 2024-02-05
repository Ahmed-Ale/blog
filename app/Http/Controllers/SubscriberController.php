<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request.
        // dd($request->all());
        $subscriber = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create($subscriber);
        return back()->with('status', 'Subscribed Successfully!');

        // Create a new subscriber and save it to the database.
        // $subscriber = new Subscriber;
        // $subscriber->email = $request->input('email');
        // $subscriber->save();

        // return to_route('theme.index');
        // return response()->json([
        //     'message' => 'Successfully created subscriber!',
        //     'data' => $subscriber,
        // ], 201);
    }
}
