<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get the particular cattle's health records that belong to the authenticated user
        $user = Auth::user();
        //get the users herd
        $herd = $user->herd;
        //confirm the herd has cattle
        if (!$herd) {
            return view('farmers.medical.index', [
                'medicals' => null,
            ]);
        }
        //get the cattle in the herd
        $cattle = $herd->cattle;
        //get the medical recors whose cattle id are in the collected cattle data
        $medicals = Health::whereIn('cattle_id', $cattle->pluck('id'))
            ->paginate(10);

        if (request('search')) {
            //get the id of the cattle's name that matches the search query
            $cattleId = Cattle::where('cattle_name', 'like', '%' . request('search') . '%')->pluck('id');
            //get the medical records whose cattle id are in the collected cattle data
            if ($cattleId->count() > 0) {

                $medicals = Health::where('cattle_id', $cattleId)
                    ->orWhere('disease', 'like', '%' . request('search') . '%')
                    ->orWhere('treatment', 'like', '%' . request('search') . '%')
                    ->orWhere('date', 'like', '%' . request('search') . '%')
                    ->paginate(10);
            } else {
                $medicals = Health::where('disease', 'like', '%' . request('search') . '%')
                    ->orWhere('treatment', 'like', '%' . request('search') . '%')
                    ->orWhere('date', 'like', '%' . request('search') . '%')
                    ->paginate(10);
            }
        }

        return view('farmers.medical.index', [
            'medicals' => $medicals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cattle = Cattle::where('herd_id', auth()->user()->herd->id)->get();
        return view('farmers.medical.create', [
            'cattles' => $cattle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cattle_id' => 'required',
            'disease' => 'required',
            'treatment' => 'required',
            'date' => 'required',
            'medicine_type' => 'required'
        ]);

        $medical = Health::create([
            'cattle_id' => $validated['cattle_id'],
            'disease' => $validated['disease'],
            'treatment' => $validated['treatment'],
            'date' => $validated['date'],
            'medicine_type' => $validated['medicine_type']
        ]);

        $medical->save();

        return to_route('medical.index')
            ->with('success', 'Medical record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Health $medical)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Health $medical)
    {
        $cattle = Cattle::where('herd_id', auth()->user()->herd->id)->get();
        return view('farmers.medical.edit', [
            'medical' => $medical,
            'cattles' => $cattle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Health $medical)
    {
        $this->authorize('update', $medical);

        $validated = $request->validate([
            'cattle_id' => 'required',
            'disease' => 'required',
            'treatment' => 'required',
            'date' => 'required',
            'medicine_type' => 'required'
        ]);

        $medical->update($validated);

        return to_route('medical.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Health $medical)
    {
        // echo $medical;
        // dd($medical);
        $this->authorize('delete', $medical);
        $medical->delete();

        return to_route('medical.index')
            ->with('success', 'health record deleted successfully');
    }
}
