<?php
include 'phpmailer/PHPMailerAutoload.php';
include("core/init.php");
$mac = ambil_data_mac();
global $link;
$now = Date('Y-m-d');

// validasi register
if(isset($_POST['login']) ){
    $email = $_POST['emailLogin'];
    $pass = $_POST['passLogin'];
    $id = ambil_data_idUser($email);
    if(!empty($_POST['remember'])) {
          setcookie ("member_login",$_POST['emailLogin'],time()+ (10 * 365 * 24 * 60 * 60));
          setcookie ("member_password",$_POST['passLogin'],time()+ (10 * 365 * 24 * 60 * 60));
    } else {
          if(isset($_COOKIE["member_login"])) {
                 setcookie ("member_login","");
          }
          if(isset($_COOKIE["member_password"])) {
                 setcookie ("member_password","");
          }
    }
    // trim - remove spasi
    if( !empty(trim($email)) && !empty(trim($pass)) ){
        if ( $email == 'admin@a' and $pass == 'admin'){
          header('Location: Admin/index.php');
        }
        elseif( login_cek_email($email) ){
              if( cek_data($email, $pass)){
                if ( cek_verifikasi($email)) {
                  if ( cek_mac_address($mac)){
                    $_SESSION['emailLogin'] = $email;
                    header('Location: index.php');
                  } else {
                    $query = "INSERT INTO tb_mac_address(id_user, mac_address) VALUES ('$id','$mac')";
                    mysqli_query($link, $query);
                    $_SESSION['emailLogin'] = $email;
                    verifikasi_mac($email, $mac);
                    header('Location: index.php');
                  }
                } else {
                  echo "<script>alert('Email belum di verifikasi')</script>";
                }
              }  else {
                echo "<script>alert('Data ada yang salah')</script>";
              }
        } else {
          echo "<script>alert('Email belum terdaftar di database')</script>";
        }
    }
    else{
        echo "<script>alert('Tidak boleh kosong')</script>";
    }
}
?>
