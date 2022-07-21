<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Map example</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
            height: 400px;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div id="map"></div>
</div>

<script type="text/javascript">
/*
    function initMap() {
        var users = {!! json_encode($users) !!};
        var geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            mapTypeId : google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var allMarkers = [];

        $.each(users,function (index,value){
            geocoder.geocode( { 'address': value}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    var point = new google.maps.LatLng(
                        latitude,
                        longitude
                    );

                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        name: '',
                    });

                    allMarkers.push(marker);

                    marker.addListener('click', function () {
                        infowindow.setContent(marker.name);
                        infowindow.open(map, marker);
                    });

                }
            });
        });


   /!*     //  Fit these bounds to the map
        var bounds = new google.maps.LatLngBounds();
        for (var m in allMarkers) {
            bounds.extend(allMarkers[m].getPosition());
        }

        map.initialZoom = true;
        map.fitBounds(bounds);
        map.panToBounds(bounds);*!/
    }
*/

function initMap() {

    var users = {!! json_encode($users) !!};
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode( { 'address': users[0]}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center:{ lat: latitude, lng: longitude }
            });

            $.each(users,function (index,value){
                geocoder.geocode( { 'address': value}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        var myLatLng = { lat:latitude, lng: longitude };

                        new google.maps.Marker({
                            position: myLatLng,
                            map,
                            title: "Hello Rajkot!",
                        });

                    }
                });
            });

        }

    });






/*
    var myLatLng = { lat: 49.993500, lng: 36.230385 };


    new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello Rajkot!",
    });

    bounds.extend(myLatLng);

    map.fitBounds(bounds);
*/



}



window.initMap = initMap;
</script>

<script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>

</body>
</html>
