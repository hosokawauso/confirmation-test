<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request)
    {
       $request->authenticate();

        /* return app(LoginResponse::class); */

        return redirect()->intended('/admin');


    }
}
