@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row">
    	@each('trips.partials.trip-card', $trips, 'trip')
    </div>
</div>
@endsection