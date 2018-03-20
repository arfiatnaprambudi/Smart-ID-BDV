<?php

include("koneksi.php");

    $mac = $_POST['mac'];
    $nama = $_POST['nama'];
    // $pass = $_POST['pass'];
    $tanggalLahir =$_POST['tanggalLahir'];
    // $gender = $_POST['gender'];
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

    // $pass_hash = password_hash($pass, PASSWORD_DEFAULT);


mysql_query("UPDATE member_bdv SET
    mac          = '$mac',
    nama         = '$nama',
    tanggalLahir = '$tanggalLahir',
    kota         = '$kota',
    noHp         = '$noHp',
    profesi      = '$profesi',
    perusahaan   = '$perusahaan',
    keahlian     = '$keahlian',
    instagram    = '$instagram',
    linkedln     = '$linkedln',
    facebook     = '$facebook'
    WHERE email  = '$email'")
    or die("Update data pada table member bdv gagal. ".mysql_error());

?>
<script>
	alert('Update user berhasil');
	document.location='admin_view.php';
</script>