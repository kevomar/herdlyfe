<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Milk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MilkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $herdId = $user->herd->id;
        //get the milk records whose cattle belong to the owner
        $milk = Milk::whereHas('cattle', function ($query) use ($herdId) {
            $query->where('herd_id', $herdId);
        })->with('cattle', 'cattle.herd', 'cattle.herd.user')->paginate(10);
        // $milk = Milk::where(
        //     'cattle->id',
        //     $herd->cattle->id
        // )->latest('date', 'shift')
        //     ->paginate(10);

        if (request('search')) {

            //get the cattle id from the name of the cattle provided
            $cattle_id = Cattle::where('cattle_name', 'like', '%' . request('search') . '%');
            $cattle_id = $cattle_id->pluck('id');
            if ($cattle_id->count() > 0) {
                foreach ($cattle_id as $id) {

                    $milk = Milk::where('cattle_id', 'like', '%' . $id . '%')
                        ->orWhere('date', 'like', '%' . request('search') . '%')
                        ->orWhere('shift', 'like', '%' . request('search') . '%')
                        ->orWhere('quantity', 'like', '%' . request('search') . '%')
                        ->paginate(10);
                }
            } else {

                $milk = Milk::where('date', 'like', '%' . request('search') . '%')
                    ->orWhere('shift', 'like', '%' . request('search') . '%')
                    ->orWhere('quantity', 'like', '%' . request('search') . '%')
                    ->paginate(10);
            }
        }

        return view('farmers/milk/index', [
            'milks' => $milk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cattles = Cattle::where('herd_id', auth()->user()->herd->id)->get();
        return view(
            'farmers.milk.create',
            [
                'cattles' => $cattles
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cattle_id' => 'required',
            'date' => 'required',
            'shift' => 'required',
            'quantity' => 'required',
        ]);

        $milk = Milk::create([
            'cattle_id' => $validated['cattle_id'],
            'date' => $validated['date'],
            'shift' => $validated['shift'],
            'quantity' => $validated['quantity'],
        ]);

        $milk->save();

        return to_route('milk.index')
            ->with('success', 'Milk record added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milk $milk)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milk $milk)
    {
        $cattles = Cattle::where('herd_id', auth()->user()->herd->id)->get();
        return view('farmers.milk.edit', [
            'milk' => $milk,
            'cattles' => $cattles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milk $milk)
    {
        $this->authorize('update', $milk);
        $validated = $request->validate([
            'cattle_id' => 'required',
            'date' => 'required',
            'shift' => 'required',
            'quantity' => 'required',
        ]);

        $milk->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milk $milk)
    {
        $this->authorize('delete', $milk);
        $milk->delete();

        return to_route('milk.index')
            ->with('success', 'Milk record deleted successfully');
    }
}
