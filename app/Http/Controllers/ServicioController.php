<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
// use Illuminate\Database\Eloquent\Builder;
// use \Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $perPage = 10;
        // $ttl = now()->addDays(1);
        // $page = request()->get('page') ?: 1;
        // $fromDate = now()->subDay(7)->toDateString();
        // $cacheKey = 'servicios_thprobes_count_' . $fromDate;
        // $value = Cache::remember('users1', 15, function () {
        //     return Servicio::get();
        // });
        // dd($value);
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia(
            'Servicio/Index',
            [
                'filters' => $filters,
                'servicios' => Servicio::where('working_hours','>',1)
                    ->orwhere('daily','>',1)
                    ->orwhere('monthly','>',1)
                    ->orwhere('weekly','>',1)
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
