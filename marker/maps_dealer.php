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
            $stmt = $db->prepare('select * from data_dealer');
            $stmt->execute();
            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                $nmdealer = $row['nmdealer'];
                $latitude = $row['latitude'];
                $lon = $row['longitude'];
                $merek = $row['merk'];
                $alamat = $row['alamat'];
                
                echo ("addMarker($latitude, $lon, 'Nama : $nmdealer<br/>Merk : $merek<br/>Alamat : $alamat');\n");                      
            }
          ?>
          
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
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
