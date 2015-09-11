<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script type="text/javascript"
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTaBtOBnWAv-OyDVBgHqDTIzmOMu2j_CE&sensor=TRUE">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"/>
  </body>
</html>
