<?php
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Bengkel & Dealer Motor di Pemalang | Halaman Admin</title>
  <link rel="icon" href="../icons/logo.png"/>
  <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> --> <!-- old version, doesnt work in localhost --> 
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX2OQgxYF6IVDP86aPgN7awXYB4zt_hhc&sensor=false" type="text/javascript"></script>

  <script>
    var marker;
      function initialize() {
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            $stmt = $db->prepare('select * from data_bengkel');
            $stmt->execute();
            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
         
                $nmbengkel = $row['nmbengkel'];
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];                
                echo ("addMarker($latitude, $longitude, 'Lokasi : $nmbengkel<br/>Latitude : $latitude<br/>Longitude : $longitude');\n");                      
            }
          ?>
          
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lok = new google.maps.LatLng(lat, lng);
            bounds.extend(lok);
            var marker = new google.maps.Marker({
                map: map,
                position: lok
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
   </script>

 </head>
 <body>
  <div align="center" class="panel-body">
      <div id="map-canvas" style="width:1500px;height:700px;"></div>
  </div>
 </body>
</html>
