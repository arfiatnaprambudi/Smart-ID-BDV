<?php

include("model/database.php");
include("function/controller_user.php");

global $link;
$now = Date('Y-m-d');
$mac = ambil_data_mac();

if ($mac !== ''){
  if(cek_mac_address_logs($mac)){ //cek apakah mac_address sudah ada di tb_logs atau belum
    if (cek_tgl($mac, $now)){ // cek apakah tanggal mac_address yang di tb_logs sama dengan tgl sekarang atau tidak
        $query = "INSERT INTO tb_logs(mac_address, tgl_akses) VALUES ('$mac', '$now')"; //masukin data mac & tgl sekarang ke database
        mysqli_query($link, $query);
    }
  } else {
    $query = "INSERT INTO tb_logs(mac_address, tgl_akses) VALUES ('$mac', '$now')"; //masukin data mac & tgl sekarang ke database
    mysqli_query($link, $query);
  }
}
?>
