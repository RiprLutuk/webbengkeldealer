<?php

include '../config/koneksi.php';

$merk = $_GET['merk'];

$stmt = $db->prepare('select * from data_dealer where merk=:merk ORDER BY nmdealer ASC');
$stmt->bindValue(":merk", $merk, PDO::PARAM_STR);
$stmt->execute();
$result = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $foto = 'http://bengkeldealer.mapscrip.com/img/' . $row['foto'];
    array_push($result, array(
        'kddealer' => $row['kddealer'],
        'nmdealer' => $row['nmdealer'],
        'merk' => $row['merk'],
        'jmlkaryawan' => $row['jmlkaryawan'],
        'haribuka' => $row['haribuka'],
        'jambuka' => $row['jambuka'],
        'alamat' => $row['alamat'],
        'kelurahan' => $row['kelurahan'],
        'kecamatan' => $row['kecamatan'],
        'kdpos' => $row['kdpos'],
        'kabupaten' => $row['kabupaten'],
        'telepon' => $row['telepon'],
        'fasilitas' => $row['fasilitas'],
        'pelayanan' => $row['pelayanan'],
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'foto' => $foto,
        'username' => $row['username'],
        'waktu' => $row['waktu']
    ));
}

echo json_encode($result, JSON_UNESCAPED_SLASHES);
?>