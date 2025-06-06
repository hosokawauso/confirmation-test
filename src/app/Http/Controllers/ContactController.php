<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        $categories = Category::all();
        $old = old();

        return view('contact', compact('categories', 'old'));
    }

    public function confirm(ContactRequest $request)
    {
        
        $contact = $request->only([
            'last_name', 
            'first_name', 
            'gender', 
            'email', 
            'tel1', 
            'tel2', 
            'tel3', 
            'address',
            'building', 
            'category_id', 
            'detail'
        ]);

        $contact['name'] = $contact['last_name'] . ' ' . $contact['first_name'];


        $contact['tel'] = $contact['tel1'] . '-' . $contact['tel2'] . '-' . $contact['tel3'];

        session()->put('contact_input', $contact);
        
        $category = Category::find($contact['category_id']) ;
        
        return view('confirm', compact('contact','category'));
    }

    public function thanks(Request $request)
    {
        /* dd([
            'request_all' => $request->all(),
            'request_input_detail' => $request->input('detail'),
        ]);
 */
        $contact = $request->only([
            'last_name', 
            'first_name', 
            'gender', 
            'email', 
            'tel', 
            'address',
            'building', 
            'category_id', 
            'detail',
        ]);

        $contact['name'] = $contact['last_name'] . ' ' . $contact['first_name'];
        $contact['category_id'] = (int) $contact['category_id'];

       
        $categories = Category::all();

        Contact::create($contact);

        session()->forget('contact_input');

        return view('thanks');
    }

    public function reinput(Request $request)
    {
        $contact = session()->get('contact_input');
        return redirect('/')->withInput($contact);
    }

}
