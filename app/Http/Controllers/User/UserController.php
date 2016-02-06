<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for the current user.
     *
     * @return Response
     */
    public function showProfile()
    {
    	$user = Auth::user();
    	if ($user != null) {
    		return $user;
    	}

        return ["error" => "User not found."];
    }
}


