<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $q = Listing::with(['owner'  => function (Builder $query) {
        //     dd($query);
        //     $query->where('id', '>', '0');
        // }

        // ])->get();
        // dd($q);
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
 
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()->filter($filters)
                ->paginate(10)
                ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
 
    /**
     * Display the specified resource.
     */
    public function show(Listing $listing )
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    
}
