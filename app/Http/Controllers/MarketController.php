<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $markets = Market::all();
        return view('market.index', [
            'markets' => $markets,
        ]);
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
    public function show(Market $market)
    {
        $amount = 0;
        foreach ($market->cattle->milk as $milk) {
            $amount += $milk->quantity;
        }

        $age = $market->cattle->date_of_birth->diffInMonths(now());
        return view('market.show', [
            'market' => $market,
            'amount' => $amount,
            'age' => $age,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Market $market)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Market $market)
    {
        //
    }
}
