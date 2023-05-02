<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    public function index(Request $request){
        // dd( Auth::user()->listings()->withTrashed()->get());
        dd( Auth::user()->with(['listings'  => function ($query) {
            return $query->where('price','>','700000');
        }])->get());
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by','order'])
        ];
        return inertia('Realtor/Index',[
            'listings' => Auth::user()->listings()->filter($filters)->get(),
        ]);
    }
    
    public function destroy(Listing $listing)
    {
        //
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
