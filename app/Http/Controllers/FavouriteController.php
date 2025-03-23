<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        // Fetch the favourited blogs for the authenticated user
        $favorites = auth()->user()->favorites;

        // Return the view with the favourited blogs
        return view('favourites.index', compact('favorites'));
    }
}
