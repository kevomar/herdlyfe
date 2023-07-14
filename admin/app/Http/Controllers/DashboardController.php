<?php

namespace App\Http\Controllers;

use App\Models\Cattle;
use App\Models\Market;
use App\Models\Milk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $cattles = Cattle::all();
        $milks = Milk::all();
        $markets = Market::all();
        $year = date('Y');
        $startDate = Carbon::now()->startOfWeek(); // Start of current week
        $endDate = Carbon::now()->endOfWeek(); // End of current week

        $yearlyMilkData = Milk::whereYear('date', '=', $year)
            ->orderByRaw("MONTH(date)")
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($d) {
                return Carbon::parse($d->date)->format('M');
            });

        $weeklyMilkData = Milk::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get()
            ->groupBy(function ($d) {
                return Carbon::parse($d->date)->format('M');
            });

        $months = [];
        $milkCount = [];
        $thisWeek = [];
        $thisWeeksCount = [];


        foreach ($yearlyMilkData as $key => $values) {
            $months[] = $key;
            $milkCount[] = $values->sum('quantity');
        }

        foreach ($weeklyMilkData as $key => $values) {
            $thisWeek[] = $key;
            $thisWeeksCount[] = $values->sum('quantity');
        }


        return view('dashboard', [
            'users' => $users,
            'cattles' => $cattles,
            'milks' => $milks,
            'markets' => $markets,
            'months' => $months,
            'milkCount' => $milkCount,
            'week' => $thisWeek,
            'weekCount' => $thisWeeksCount,
        ]);
    }
}
