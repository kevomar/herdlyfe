<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Cattle;
use App\Models\Herd;
use Illuminate\Http\Request;

class CattleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cattle = Cattle::where('herd_id', auth()->user()->herd->id)->get();
        $maleCount = $cattle->where('gender', 'bull')->count();
        $femaleCount = $cattle->where('gender', 'female')->count();
        $averageAge = round($cattle->avg(
            fn ($cattle) => $cattle->date_of_birth->diffInYears(now())
        ));
        $cattles = Cattle::where('herd_id', auth()->user()->herd->id)
            ->paginate(10);

        if (request('search')) {
            $cattle = cattle::where('cattle_name', 'like', '%' . request('search') . '%')
                ->paginate(10);
        }
        return view('farmers.cattle.index', [
            'page' => 1,
        ], [
            'cattles' => $cattles,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'averageAge' => $averageAge,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breeds = Breed::all();
        $herds = Herd::all();
        return view('farmers/cattle/create', [
            'breeds' => $breeds,
            'herds' => $herds
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cattle_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'breed' => 'required|exists:breeds,id',
            'herd' => 'required|exists:herds,id',
            'gender' => 'required|in:bull,cow',
            'status' => 'required|in:alive,dead',
        ]);

        $cattle = Cattle::create([
            'cattle_name' => $validatedData['cattle_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'breed_id' => $validatedData['breed'],
            'herd_id' => auth()->user()->herd->id,
            'gender' => $validatedData['gender'],
            'status' => $validatedData['status'],
        ]);

        // $request->user()->cattle()->create($validatedData);
        $cattle->save();

        $lastPage = cattle::paginate(10)->lastPage();

        return redirect(route('cattle.index', ['page' => $lastPage]))
            ->with('success', 'Cattle added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cattle $cattle)
    {
        $amount = 0;
        $children = 0;
        foreach ($cattle->milk as $milk) {
            $amount += $milk->quantity;
        }

        if ($cattle->gender == 'cow') {
            $children = $cattle->breeding->count();
        } else {
            $children = $cattle->sire->count();
        }

        if ($cattle->gender == 'cow') {
            $breeding = $cattle->breeding;
        } else {
            $breeding = $cattle->sire;
        }
        return view('farmers.cattle.show', [
            'cattle' => $cattle,
            'amount' => $amount,
            'children' => $children,
            'milks' => $cattle->milk,
            'medicals' => $cattle->health,
            'breedings' => $breeding,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cattle $cattle)
    {
        return view('farmers.cattle.edit', [
            'cattle' => $cattle,
            'breeds' => Breed::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cattle $cattle)
    {
        $this->authorize('update', $cattle);
        $validatedData = $request->validate([
            'cattle_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'breed' => 'required|exists:breeds,id',
            'gender' => 'required|in:bull,cow',
            'status' => 'required|in:alive,dead',
        ]);

        $cattle->update($validatedData);

        return to_route('cattle.show', $cattle)
            ->with('success', 'Cattle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cattle $cattle)
    {
        $this->authorize('delete', $cattle);
        $cattle->delete();

        return to_route('cattle.index')
            ->with('success', 'Cattle deleted successfully');
    }
}
