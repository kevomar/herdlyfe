<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$herdId = auth()->user()->herd->id;
        $feeds = Feed::paginate(10);

        if (request('search')) {
            $feeds = Feed::where('feed_name', 'like', '%' . request('search') . '%')
                ->orWhere('price', 'like', '%' . request('search') . '%')
                ->paginate(10);
        }

        return view('admin.feeds.index', [
            'feeds' => $feeds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feeds.create', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feed_name' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
        ]);

        //calculate totoal price
        $total_price = $request->quantity * $request->unit_price;

        $feed = Feed::create([
            'herd_id' => Auth::user()->herd->id,
            'feed_name' => $request->feed_name,
            'quantity' => $request->quantity,
            'purchase_date' => $request->purchase_date,
            'unit_price' => $request->unit_price,
            'total_price' => $total_price,
        ]);
        $feed->save();

        return to_route('feeds.index')
            ->with('success', 'Feed added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed)
    {
        return view('admin.feeds.edit', [
            'feed' => $feed,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feed $feed)
    {

        $validated = $request->validate([
            'feed_name' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
        ]);

        $feed->update($validated, [
            'total_price' => $request->quantity * $request->unit_price,
        ]);

        return to_route('feeds.index')
            ->with('success', 'Feed updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed)
    {

        $feed->delete();

        return to_route('feeds.index')
            ->with('success', 'Feed deleted successfully');
    }
}
