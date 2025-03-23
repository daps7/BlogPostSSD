<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        // Fetch the favourited blogs for the authenticated user
        $favourites = auth()->user()->favourites;

        // Return the view with the favourited blogs
        return view('favourites.index', compact('favourites'));
    }
}
