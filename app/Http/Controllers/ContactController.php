<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $contact = $request->validated();

        Contact::create($contact);

        return back()->with('success', 'Your message sent Successfully!');
    }
}
