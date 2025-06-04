<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        //$user = Auth::user();
        $categories = Category::all();
       
        $contacts = Contact::with('category')->paginate(7);
        //$contacts = $query->paginate(7);

        

        return view('admin.index', compact('contacts', 'categories'));
    }
    
    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }
}

