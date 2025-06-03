<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        //$user = Auth::user();

        $contents = Contact::paginate(7);
        //$contacts = $query->paginate(7);

        return view('admin.index', compact('contacts'));
    }
    
}
