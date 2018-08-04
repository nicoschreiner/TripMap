<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $trips = Auth::user()->trips()->withCount('steps')->get();

        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        $this->authorize('create', Trip::class);

        return view('trips.create');
    }

    public function edit(Request $request, Trip $trip)
    {
        $this->authorize('update', $trip);

        return view('trips.edit', compact('trip'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Trip::class);

        $request->validate([
            'name'        => 'bail|required|max:64|string',
            'description' => 'bail|required|max:2048|string',
        ]);

        $trip = new Trip();

        $trip->user_id     = Auth::id();
        $trip->name        = $request->name;
        $trip->description = $request->description;

        $trip->save();

        return redirect()->route('trips.index');
    }

    public function update(Request $request, Trip $trip)
    {
        $this->authorize('update', $trip);

        $request->validate([
            'name'        => 'bail|required|max:64|string',
            'description' => 'bail|required|max:2048|string',
        ]);

        $trip->name        = $request->name;
        $trip->description = $request->description;

        $trip->save();

        return redirect()->route('trips.index');
    }

    public function destroy(Request $request, Trip $trip)
    {
        $this->authorize('delete', $trip);

        $trip->delete();

        return redirect()->route('trips.index');
    }
}
