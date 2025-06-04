<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'category_id', 'detail']);
        $contact['name'] = $contact['last_name'] . ' ' . $contact['first_name'];
        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];
        
        return view('confirm', compact('contact'));
    }

    public function thanks(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'category_id', 'detail']);
        $contact['name'] = $contact['last_name'] . ' ' . $contact['first_name'];
        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];

        Contact::create($contact);

        return view('thanks');
    }

}
