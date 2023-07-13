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

        $milkData = Milk::whereYear('created_at', '=', 2023)
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($d) {
                return Carbon::parse($d->created_at)->format('M');
            });

        $months = [];
        $milkCount = [];

        foreach ($milkData as $key => $values) {
            $months[] = $key;
            $milkCount[] = $values->sum('quantity');
        }

        dd($months);
        return view('dashboard', [
            'users' => $users,
            'cattles' => $cattles,
            'milks' => $milks,
            'markets' => $markets,
        ]);
    }
}
