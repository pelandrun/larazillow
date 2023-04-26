<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    //
    public function index()
    {
        // return "index";
        // dd(Listing::all());
        dd(Auth::user());
        return inertia(
            'Index/Index',
            ['message' => 'hellow from laravel!']
        );
    }
    public function show(){
        Listing::find(10);
        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
        // return inertia('Index/Show');
    }
}
