<?php

namespace App\Http\Controllers;

use App\Models\Breeding;
use App\Models\Cattle;
use Illuminate\Http\Request;

class BreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user()->herd);
        if (Breeding::where('cattle_id', auth()->user()->herd->cattle->id) || Breeding::where('sire_id', auth()->user()->herd->cattle->id)) {

            $my_breeding_cattle = Breeding::where('cattle_id', auth()->user()->herd->cattle->id)->get();
            $my_sire_cattle = Breeding::where('sire_id', auth()->user()->herd->cattle->id)->get();
            $breedings = Breeding::whereIn('cattle_id', $my_breeding_cattle)
                ->orWhereIn('sire_id', $my_sire_cattle)
                ->latest()
                ->paginate(10);
        }

        if (request('search')) {
            //get cattle and sires whose name matches the request field
            $cattle_id = Cattle::where('cattle_name', 'like', '%' . request('search') . '%')->pluck('id');

            $breedings = Breeding::where('cattle_id', $cattle_id)
                ->orWhere('sire', $cattle_id)
                ->paginate(10);
        }

        // $breedings = Breeding::paginate(10);

        return view('farmers.breeding.index', [
            'breedings' => $breedings,

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
    public function show(Breeding $breeding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Breeding $breeding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Breeding $breeding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Breeding $breeding)
    {
        //
    }
}
