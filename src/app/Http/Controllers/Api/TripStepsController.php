<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\TripStep;

class TripStepsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Trip $trip)
    {
        return $trip->steps()->get();
    }
}
