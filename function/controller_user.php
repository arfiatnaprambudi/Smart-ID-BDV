<?php

function register_user($nama, $pass, $gender, $tgl_lahir, $kota, $email, $no_hp, $profesi, $perusahaan, $keahlian, $instagram, $linkedln, $facebook, $hash, $active){
    global $link;
    // mencegah sql injection
    $nama = mysqli_real_escape_string($link, $nama);
    $pass = mysqli_real_escape_string($link, $pass);
    $gender = mysqli_real_escape_string($link, $gender);
    $tgl_lahir = mysqli_real_escape_string($link, $tgl_lahir);
    $kota = mysqli_real_escape_string($link, $kota);
    $email = mysqli_real_escape_string($link, $email);
    $no_hp = mysqli_real_escape_string($link, $no_hp);
    $profesi = mysqli_real_escape_string($link, $profesi);
    $perusahaan = mysqli_real_escape_string($link, $perusahaan);
    $keahlian = mysqli_real_escape_string($link, $keahlian);
    $instagram = mysqli_real_escape_string($link, $instagram);
    $linkedln = mysqli_real_escape_string($link, $linkedln);
    $facebook = mysqli_real_escape_string($link, $facebook);
    $hash = mysqli_real_escape_string($link, $hash);
    $active = mysqli_real_escape_string($link, $active);
    // $foto = mysqli_real_escape_string($link, $foto);

    // Encrypt password

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_user(nama, pass, gender, tgl_lahir, kota, email, no_hp, profesi, perusahaan, keahlian, instagram, linkedln, facebook, hash, active, foto) VALUES ('$nama', '$pass', '$gender', '$tgl_lahir', '$kota', '$email', '$no_hp', '$profesi', '$perusahaan', '$keahlian', '$instagram', '$linkedln', '$facebook', '$hash', '$active', '')";

    if( mysqli_query($link, $query) ) return true;
    else return false;
}

// cegah duplikasi username
function register_cek_email($email){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $email);

    $query = "SELECT * FROM tb_user where email = '$email'";

    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) == 0) return true;
        else return false;
    }
}

// cek verifikasi email
function verifikasi_email($email, $nama, $pass, $hash) {
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = 'almirakhonsa@gmail.com';
    $mail->Password = 'almi08161620306';

    $mail->SetFrom('almirakhonsa@gmail.com', 'Email Verification');
    $mail->AddAddress($email);

    $mail->Subject = trim("Signup | Verification");
    $blank = ' ';
    $message = '<html>
<head>
<style>
.tombol {
	padding: 10px;
	background: #2ca8e0;
	border-radius: 5px;
	text-decoration:none;
	color:white;
}
table {
	border-top: 1px solid #2ca8e0;
border-bottom: 1px solid #2ca8e0;
border-left: 1px solid #2ca8e0;
border-right: 1px solid #2ca8e0;
padding: 10px;
}

</style>
</head>
<body style="font-family:calibri">
      <center> <table width="400">
        <tr>
          <td style="text-align:right"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw9mvNpXW3bhoWauYmDj7bGMFYJgUwQe-cBl5k0nbgCdtKclIh" height="80"> </td>
        </tr>
        <tr>
            <td style="padding-bottom:20px;">
            <h4> Thank You ' .$nama. ' ! </h4>
            <p> Please confirm your email address by clicking the link below. </p>
            <p> We may need to send you critical information about our service and it is important
            that we have an accurate email address. </p> <br>

            <a class="tombol" href="http://localhost/ProjectKP/konfirm.php?email=' .$email. '&hash=' .$hash. '"> Activate Email </a>

            </td>
        </tr>
        <tr>
          <td style=" height:50; text-align:center"> <a style="text-decoration:none; color:#2ca8e0;" href="http://bandungdigitalvalley.com/"> www.bandungdigitalvalley.com </a> </td>
        </tr>
      </table> </center>
</body>
    </html>'; // Our message above including the link
    $mail->MsgHTML($message);
     // Send our email
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

function verifikasi_mac($email, $mac) {
  $hash = ambil_data_hash($email);
  $mail = new PHPMailer(); // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
  $mail->Username = 'almirakhonsa@gmail.com';
  $mail->Password = 'almi08161620306';
  $mail->SetFrom('almirakhonsa@gmail.com', 'Email Verification');
  $mail->AddAddress($email);

  $mail->Subject = trim("Signup | Verification");
  $blank = ' ';
  $mac = $mac;
  $host = gethostname(); // may output device name
  $message = '<html>
<head>
<style>
.tombol {
    padding: 10px;
    background: #2ca8e0;
    border-radius: 5px;
    text-decoration:none;
    color:white;
}
table {
    border-top: 1px solid #2ca8e0;
border-bottom: 1px solid #2ca8e0;
border-left: 1px solid #2ca8e0;
border-right: 1px solid #2ca8e0;
padding: 10px;
}

</style>
</head>
<body style="font-family:calibri">
      <center> <table width="400">
        <tr>
          <td style="text-align:right"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw9mvNpXW3bhoWauYmDj7bGMFYJgUwQe-cBl5k0nbgCdtKclIh" height="80"> </td>
        </tr>
        <tr>
            <td style="padding-bottom:20px;">
            <h4> Thank You ' .$nama. ', your device name is ' .$host. '! </h4>
            <p> Please confirm your device to use connection in BDV by clicking the link below.</p> <br>
            <a class="tombol" href="http://localhost/ProjectKP/konfirm_ulang.php?email=' .$email. '&hash=' .$hash. '"> Activate Device </a>
        </tr>
        <tr>
          <td style=" height:50; text-align:center"> <a style="text-decoration:none; color:#2ca8e0;" href="http://bandungdigitalvalley.com/"> www.bandungdigitalvalley.com </a> </td>
        </tr>
      </table> </center>
</body>
    </html>'; // Our message above including the link
    $mail->MsgHTML($message);
     // Send our email
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

// cek nama terdaftar / belum
function login_cek_email($email){
    global $link;

    $nama = mysqli_real_escape_string($link, $email);

    $query = "SELECT * FROM tb_user where email = '$email'";

    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) > 0) return true;
        else return false;
    }
}

// cek password Login
function cek_data($email, $pass){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $email);
    $pass = mysqli_real_escape_string($link, $pass);

    $query = "SELECT pass FROM tb_user WHERE email = '$email'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['pass'];
    if( password_verify($pass, $hash) ) return true;
    else return false;
}

function cek_verifikasi($email){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $email);

    $query = "SELECT active FROM tb_user WHERE email = '$email'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['active'];
    if( $hash == 1 ) return true;
    else return false;
}

function cek_verifikasi_mac($mac){
    global $link;
    // mencegah sql injection
    $mac = mysqli_real_escape_string($link, $mac);

    $query = "SELECT active FROM tb_mac_address WHERE mac_address = '$mac'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['active'];
    if( $hash == 1 ) return true;
    else return false;
}

function cek_mac_address($mac){
    global $link;
    // mencegah sql injection
    $mac = mysqli_real_escape_string($link, $mac);

    $query = "SELECT mac_address FROM tb_mac_address WHERE mac_address = '$mac'";

    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) > 0) return true;
        else return false;
    }
}

function cek_mac_address_logs($mac){
    global $link;
    // mencegah sql injection
    $mac = mysqli_real_escape_string($link, $mac);

    $query = "SELECT mac_address FROM tb_logs WHERE mac_address = '$mac'";

    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) > 0) return true;
        else return false;
    }
}

function cek_tgl($mac, $date){
    global $link;
    // mencegah sql injection
    $mac = mysqli_real_escape_string($link, $mac);

    $query = "SELECT tgl_akses FROM tb_logs WHERE mac_address = '$mac' AND tgl_akses = '$date'";

    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) > 0) return false;
        else return true;
    }
}

function ambil_data_mac(){
  ob_start(); // Turn on output buffering
  system('ipconfig /all'); //Execute external program to display output
  $mycom=ob_get_contents(); // Capture the output into a variable
  ob_clean(); // Clean (erase) the output buffer
  $findme = "Physical";
  $pmac = strpos($mycom, $findme); // Find the position of Physical text
  $mac=substr($mycom,($pmac+36),17); // Get Physical Address
  return $mac;
}

function ambil_data_idUser($email){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $email);

    $query = "SELECT id_user FROM tb_user WHERE email = '$email'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['id_user'];
    return $hash;
}

function ambil_data_hash($email){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $email);

    $query = "SELECT hash FROM tb_user WHERE email = '$email'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['hash'];
    return $hash;
}

function ambil_data_email($id){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $id);

    $query = "SELECT email FROM tb_user WHERE id_user = '$id'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['email'];
    return $hash;
}

function ambil_data_idUser_mac($mac){
    global $link;
    // mencegah sql injection
    $email = mysqli_real_escape_string($link, $mac);

    $query = "SELECT id_user FROM tb_mac_address WHERE mac_address = '$mac'";

    $result = mysqli_query($link, $query);
    $hash = mysqli_fetch_assoc($result);
    $hash = $hash['id_user'];
    return $hash;
}

// clear all session
function logout($session){
    unset($session);
    session_destroy();
}
