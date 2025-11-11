<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index($category)
    {
        $destinations = Destination::where('category', $category)->get();

        return view('destinations.index', compact('destinations', 'category'));
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }
}
