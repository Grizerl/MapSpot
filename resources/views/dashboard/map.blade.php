@extends('layouts.user')

@section('title', 'Панель керування')

@section('content')
<div id="map" style="width: 100%; height: 800px;"></div>
    <script>
        const places = JSON.parse('{!! json_encode($places) !!}');
            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: 50.45, lng: 30.52 },
                        zoom: 10,
                });
            places.forEach(place => {
                const marker = new google.maps.Marker({
                    position: { lat: parseFloat(place.lat), lng: parseFloat(place.lng) },
                    map,
                    title: place.title,
                });
            marker.addListener('click', () => {
                window.location.href = 'places/' + place.id;
            });
        });
    }
        window.onload = initMap;
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap" async defer></script>
@endsection
