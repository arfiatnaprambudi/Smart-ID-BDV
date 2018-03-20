<?php

include("koneksi.php");

    $mac = $_POST['mac'];
    $nama = $_POST['nama'];
    $pass = $_POST['pass'];
    $tanggalLahir =$_POST['tanggalLahir'];
    $gender = $_POST['gender'];
    $kota = $_POST['kota'];
    $email = $_POST['email'];
    $noHp = $_POST['noHp'];
    $profesi = $_POST['profesi'];
    $perusahaan = $_POST['perusahaan'];
    $other = $_POST['other'];
    if( !empty(trim($other))) {
        $keahlian = $_POST['other'];
    } else {
        $keahlian = $_POST['keahlian'];
    }
    $instagram = $_POST['instagram'];
    $linkedln = $_POST['linkedln'];
    $facebook = $_POST['facebook'];

    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);


mysql_query("INSERT INTO member_bdv (mac, nama, pass, gender, tanggalLahir, kota, email, noHp, profesi, perusahaan, keahlian, instagram, linkedln, facebook) values ('$mac','$nama','$pass_hash','$gender','$tanggalLahir','$kota','$email','$noHp','$profesi','$perusahaan','$keahlian','$instagram','$linkedln','$facebook')") or die("Insert data pada table member bdv gagal. ".mysql_error());

?>
<script>
	alert('Registrasi user berhasil');
	document.location='admin_input_user.php';
</script>