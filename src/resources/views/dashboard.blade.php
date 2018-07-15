@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">



        <div id="map" style="width: 100%; height: calc(100vh - 56px);"></div>
        <script>
          var map;
          function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 8
            });
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemaps.key') }}&callback=initMap" async defer></script>


    </div>
</div>
@endsection
