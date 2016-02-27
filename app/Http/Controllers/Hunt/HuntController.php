<?php

namespace App\Http\Controllers\Hunt;

use App\User;
use App\Hunt;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use App\Http\Controllers\Helpers;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class HuntController extends Controller
{

    /**
     * Get a hunt by Id.
     *
     * @return Response
     */
    public function showDashboard(Hunt $hunt)
    {

    	return view('hunts/dashboard', $hunt);
    }

    /**
     * Show the create form
     *
     * @return View
     */
    public function showCreate()
    {
        return view('hunts/create', ['user' => Auth::user()]);
    }
}


