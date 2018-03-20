<?php

include("core/init.php");
include 'phpmailer/PHPMailerAutoload.php';


// validasi register
if(isset($_POST['submit']) ){
    $nama = $_POST['nama'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $tgl_lahir =$_POST['tgl_lahir'];
    $kota = $_POST['kota'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
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

    $hash = md5( rand(0,1000) );
    $active = 0;
    $foto = 0;
    // verifikasi_email($email);
    if( !empty(trim($nama)) && !empty(trim($email)) ){
        if(register_cek_email($email)){
        // cek register ke database
          if (register_user($nama, $pass, $gender, $tgl_lahir, $kota, $email, $no_hp, $profesi, $perusahaan, $keahlian, $instagram, $linkedln, $facebook, $hash, $active)){
                  verifikasi_email($email, $nama, $pass, $hash);
                  // echo "<script>alert('Berhasil daftar')</script>";
                  header("Location: check_email.php");
          } else {
            echo "<script>alert('Gagal daftar')</script>";
        }
      } else {
           echo "<script>alert('Email Anda sudah ada, anda tidak bisa daftar!')</script>";
        }
    } else {
      echo "<script>alert('Email Tidak boleh kosong')</script>";
    }
}
