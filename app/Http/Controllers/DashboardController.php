<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Milk;
use Carbon\Carbon;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $year = date('Y');
        $thisCattleIds = auth()->user()->herd->cattle;
        $cattleIds = [];
        $cattleBreeds = [];
        foreach ($thisCattleIds as $cattle) {
            array_push($cattleIds, $cattle->id);
            array_push($cattleBreeds, $cattle->breed->breed_name);
        }

        $yearlyMilkData = Milk::whereYear('date', '=', $year)
            ->whereIn('cattle_id', $cattleIds)
            ->orderByRaw("MONTH(date)")
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($d) {
                return Carbon::parse($d->date)->format('M');
            });

        $milkData = Milk::whereIn('cattle_id', $cattleIds)
            ->get()
            ->groupBy(function ($d) {
                return $d->cattle->breed->breed_name;
            });


        $months = [];
        $milkCount = [];
        $breedQuantity = [];
        $breeds = [];

        foreach ($yearlyMilkData as $key => $values) {
            $months[] = $key;
            $milkCount[] = $values->sum('quantity');
        }

        foreach ($milkData as $key => $values) {
            $breeds[] = $key;
            $breedQuantity[] = $values->sum('quantity');
        }

        return view('dashboard', [
            'months' => $months,
            'milkCount' => $milkCount,
            'breeds' => $breeds,
            'breedCount' => $breedQuantity,
        ]);
    }
}
