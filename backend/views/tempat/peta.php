<html>
<head>

  <title>Google Maps Multiple Markers</title>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyAHpQseAswmtTuLtpzszIPlhqnCcqd0VKU&callback=initMap" type="text/javascript"></script>

</head>
<body>
  <h1><marquee>SELAMAT DATANG DI WEBSITE PARIWISATA SUMATERA UTARA</marquee></h1>
  <div id="map" style="height: 500px; width: 1150px;">
</div>
<script type="text/javascript">
    var locations = [
      ["<h1>Tarutung</h1><p> Ini adalah tempat pariwisata </p>", 3.5518001300518773, 98.67095947265625, 1, ],
['medan',	2.2790618517710803,	99.47845458984375,2],

    ];


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(3.5915482137106234, 98.675079345703124),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>
