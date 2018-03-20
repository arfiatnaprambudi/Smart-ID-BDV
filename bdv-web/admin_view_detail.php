<?php
include("koneksi.php");

$email = $_GET['email'];
$query = mysql_query("SELECT * FROM member_bdv WHERE email='$email' ");
        $data=mysql_fetch_array($query);
            $nama = $data['nama'];  
            $profesi = $data['profesi'];
            $perusahaan = $data['perusahaan'];
            //$mac_address = $data['MAC_ADDRESS'];
            //$waktu_login = $data['WAKTU_LOGIN'];
            $gender = $data['gender'];
            $tanggal_lahir = $data['tanggalLahir'];
            $kota = $data['kota'];
            $email = $data['email'];
            $pass = $data['pass'];
            $no_hp = $data['noHp'];
            $keahlian = $data['keahlian'];
            $linkedin = $data['linkedln'];
            $instagram = $data['instagram'];
            $facebook = $data['facebook'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | BDV Membership</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/bdvlogo.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding-top: 100px;">
    <!-- Content -->

    <nav class="navbar navbar-default navbar-fixed-top" style="height: 100px">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
        <img alt="Brand" src="img/bdvlogo.png" style="height:80px">
      </a>
    </div>
  </div>
    </nav>

    <div class="container" style="padding-top: 20px;padding-bottom: 20px;">
      <div class="row">
        <div class="col-md-6 col-md-offset-2">
          <h3>Member Profile</h3>
              <table border="1">
                <tr>
                  <td style="padding: 10px;">
                    <table border="0">
                        <tr>
                            <td colspan="2"><h4><b><?php echo $nama;?></b></h4></td>
                            <td></td>
                            <td rowspan="2"><a href="admin_view.php" style="color: white;"><button type="submit" class="btn btn-primary" style="width: 100px">Back</button></a></td>
                        </tr>
                        <tr><td><?php echo $email;?></td></tr>
                        <tr><td colspan="4"><hr></td></tr>
                        <tr align="center">
                            <th><label>Perusahaan </label></th>
                            <th colspan="2"><label>Profesi </label></th>
                            <th><label>Keahlian</label></th>
                        </tr>
                        <tr align="center">
                            <td><?php echo $perusahaan;?></td>
                            <td colspan="2" style="padding-right: 10px;"><?php echo $profesi;?></td>
                            <td><?php echo $keahlian;?></td>
                        </tr>
                        <tr><td colspan="4"><hr></td></tr>
                        <tr>
                            <th><label>Gender </label></th>
                            <th colspan="2"><label>Tanggal Lahir </label></th>
                            <th><label>Kota </label></th>
                        </tr>
                        <tr align="center">
                            <td><?php echo $gender;?></td>
                            <td colspan="2"><?php echo $tanggal_lahir;?></td>
                            <td><?php echo $kota;?></td>
                        </tr>
                        <tr><td colspan="4"><hr></td></tr>
                        <tr align="center">
                            <th style="padding-right: 5px;"><label>Telp Number</label></th>
                            <th style="padding-right: 5px;"><label>LinkedIn </label></th>
                            <th style="padding-left: 5px;"><label>Instagram </label></th>
                            <th style="padding-left: 15px;"><label>Facebook </label></th>
                        </tr>
                        <tr align="center">
                            <td style="padding-right: 5px;"><?php echo $no_hp;?></td>
                            <td style="padding-right: 5px;"><?php echo $linkedin;?></td>
                            <td style="padding-right: 5px;"><?php echo $instagram;?></td>
                            <td style="padding-right: 5px;"><?php echo $facebook;?></td>
                        </tr>
                    </table>
                  </td>
                </tr>
              </table>
<!--             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-9 col-sm-offset-1">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
            </div>
 -->
          
        </div>
      </div>
    </div>

    <!-- End Content -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
