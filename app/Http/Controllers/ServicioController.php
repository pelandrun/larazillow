<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Iucliente;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
        // dd(Servicio::limit(10)->get());
        // dd(Servicio::where('working_hours', '>', 1)
        //     ->orwhere('daily', '>', 1)
        //     ->orwhere('monthly', '>', 1)
        //     ->orwhere('weekly', '>', 1)
        //     ->with(['thprobes' => function (Builder $query) {
        //         return $query
        //             ->where('created', '>', now()->subDays(30))
        //             ->orderBy('created','desc')
        //             ->limit(1);
        //     }])
        //     ->paginate(10)
        //     ->withQueryString());
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
                'servicios' => Servicio::
                    // where(
                    // 'working_hours', '>', 1)
                    // ->orwhere('daily', '>', 1)
                    // ->orwhere('monthly', '>', 1)
                    // ->orwhere('weekly', '>', 1)
                    whereHas('thprobes', function ($query) {
                        $query->where('created', '>', now()->subDays(7));
                    })
                    ->with(['thprobes' => function (Builder $query) {
                        return $query
                            ->where('created', '>=', now()->subDays(7))
                            ->orderBy('created', 'desc');
                    }])
                    ->paginate(10)
                    ->withQueryString()

                // ->load('iucliente')
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
    public function show(Servicio $servicio)
    {
        // dd($servicio->thprobes);
        // dd($servicio->load('iucliente'));
        // dd(now()->subDays(7));
        return inertia(
            'Servicio/Show',
            [
                'servicio' => $servicio->load([
                    'iucliente',
                    'thprobes' => function (Builder $query) {
                        return $query->where('created', '>', now()->subDays(30))
                            ->orderBy('created', 'desc');
                    }
                ])
            ]
        );
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
