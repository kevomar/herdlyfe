<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Health;
use App\Models\Market;
use App\Models\Milk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $markets = DB::table('markets')
        //     ->inRandomOrder()
        //     ->latest()
        //     ->get();

        $markets = Market::latest()->get();

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

        $milks = Milk::where('cattle_id', $market->cattle->id)
            ->paginate(10);
        $medicals = Health::where('cattle_id', $market->cattle->id)
            ->paginate(10);

        $age = $market->cattle->date_of_birth->diffInYears(now());

        $cattle = Cattle::where('id', $market->cattle->id)->get();
        return view('market.show', [
            'cattle' => $cattle[0],
            'amount' => $amount,
            'age' => $age,
            'milks' => $milks,
            'medicals' => $medicals,
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
    /**
     * show the payment form on the  Payment page
     */

    public function payment($id)
    {
        $market = Market::where('id', $id)->get();

        return view('market.payment', [
            'market' => $market[0],
        ]);
    }

    public function forSale($id)
    {
        $cattle = Cattle::where('id', $id)->get();
        return view('farmers.market.forsale', [
            'cattle' => $cattle[0],
        ]);
    }

    public function place(Request $request, $id)
    {
        //list the cattle on the market
        Market::create([
            'cattle_id' => $id,
            'price' => $request->price,
            'status' => 'for sale',
        ]);
        // update the cattle status to fon sale
        $cattle = Cattle::where('id', $id)->update([
            'status' => 'for sale',
        ]);
        //return to the view
        return to_route('cattle.index')->with('success', 'Cattle listed on the market');
    }

    public function remove($id)
    {
        //remove the cattle from the market
        Market::where('cattle_id', $id)->delete();
        //update the cattle status to not for sale
        Cattle::where('id', $id)->update([
            'status' => 'not for sale',
        ]);
        //return to the view
        return to_route('cattle.index')->with('success', 'Cattle removed from the market');
    }
}
