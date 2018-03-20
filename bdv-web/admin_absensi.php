<?php
include("koneksi.php");
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
        <div class="col-md-8 col-md-offset-2">
        <table>
          <tr>
            <td><a href="admin_view.php">Member</a></td>
          </tr>
          <tr>
            <td><a href="#">Absensi</a></td>
          </tr>
        </table>
          <h3>Data BDV Absensi</h3>
                <!-- <table align="right">
                  <tr>
                    <td style="padding-top: 10px;"><a href="admin_input_user.php" style="color: white;"><button type="submit" class="btn btn-primary">Daftar User</button></a></td>
                  </tr>
                </table> -->
            <form name="Search Form" method="GET">
                <table align="right">
                  <tr>
                    <td style="padding: 10px">
                      <select name="searchby" required style="height: 25px;">
                        <option value="">- Search by -</option>
                        <option value="nama">Nama</option>
                        <option value="profesi">Profesi</option>
                        <option value="perusahaan">Perusahaan</option>
                        <option value="waktu">waktu</option>
                      </select>
                      <input type="text" name="searchdata" placeholder="Search data" required>
                      <button type="submit"><img title="search data" alt="Search data" src="img/search.png" style="width: 20px;height: 20px"></button>
                    </td>
                  </tr>
                </table>
              </form>

                <table border="1" style="width: 100%">
                  <tr align="center">
                      <td style="padding: 10px"><label>Nama </label></td>
                      <td><label>Profesi  </label></td>
                      <td><label>Perusahaan </label></td>
                      <td ><label>Waktu </label></td>
                      <!-- <td style="width: 13%;"></td> -->
                  </tr>
                    <?php

                    //paging initiate variable
                    $id = 1;
                    $start=0;
                    $limit=3;

                    if(isset($_GET['searchdata']))
                    { 
                    // show data search by query
                    // LIMIT query membatasi data yang ditampilkan
                      $searchby = $_GET['searchby'];
                      $searchdata = $_GET['searchdata'];
                      
                      $query = mysql_query("SELECT * FROM absensi WHERE $searchby LIKE '%$searchdata%' LIMIT $start, $limit");

                    //Qsum query mencari jumlah data
                      $Qsum = mysql_query("SELECT * FROM absensi WHERE $searchby LIKE '%$searchdata%'");
                    }
                    
                    else
                    {
                    // if variable id for paging
                      if(isset($_GET['id']))
                      {
                        $id=$_GET['id'];
                        $start=($id-1)*$limit;
                      }
                    // show all data query
                    // LIMIT query membatasi data yang ditampilkan
                      $query = mysql_query("SELECT * FROM absensi LIMIT $start, $limit");

                    //Qsum query mencari jumlah data
                      $Qsum = mysql_query("SELECT * FROM absensi");
                    }

                      $sumdata = mysql_num_rows($Qsum);
                        while ($data=mysql_fetch_array($query))
                        {
                          $name = $data['nama'];  
                          $profesi = $data['profesi'];
                          $perusahaan = $data['perusahaan'];
                          $waktu = $data['waktu'];
                    ?>
                  <tr align="center">
                      <td><?php echo $name;?></td>
                      <td style="padding: 10px"><?php echo ucwords($profesi);?></td>
                      <td style="padding: 10px"><?php echo $perusahaan;?></td>
                      <td style="padding: 10px"><?php echo $waktu;?></td>
                      <!-- <td style="padding: 10px">
                      <a href="admin_update_user.php?email=<?php echo $email;?>" style="color: white;"><img title="update data" alt="Update data" src="img/edit.png" style="width: 30px;height: 30px"></a>
                      <a href="admin_view_detail.php?email=<?php echo $email;?>" style="color: white;"><img title="view data" alt="View data" src="img/detail.png" style="width: 40px;height: 40px"></a>
                      </td> -->
                  </tr>
                        <?php } ?>
              </table>
              <table align="center">
                <tr>
                    <th colspan="5" style="padding : 10px;"> <?php echo $sumdata;?> data ditemukan </th>
                  </tr>
              </table>

              <!-- page numbering -->
              <?php
              // if isset pada page numbering berguna agar page number tetap muncul pada saat fungsi search dijalankan
              if(isset($_GET['searchdata']))
              {
                $searchby = $_GET['searchby'];
                $searchdata = $_GET['searchdata'];
                
                $rows=mysql_num_rows(mysql_query("SELECT * FROM member_bdv WHERE $searchby LIKE '%$searchdata%'"));
              }else
              {
                $rows=mysql_num_rows(mysql_query("select * from member_bdv"));
              }
                  $total=ceil($rows/$limit);

              if($id>1)
              {
                echo "<a href='?id=".($id-1)."' class='button'>
                <button class='btn btn-primary'>PREVIOUS</button> </a>";
              }
              if($id!=$total)
              {
                echo "<a href='?id=".($id+1)."' class='button'>
                <button class='btn btn-primary'>NEXT</button> </a>";
              }

              echo "<ul class='page'>";
                  for($i=1;$i<=$total;$i++)
                  {
                    if($i==$id) { echo " ".$i." "; }
                    
                    else { echo " <a href='?id=".$i."'>".$i."</a> "; }
                  }
              echo "</ul>";
              ?>
              <!-- page numbering end -->
      </div>
    </div>
    <!-- show data info -->
    <div class="row">
      <!-- show data info visited -->
      <div class="col-md-2 col-md-offset-2">
            <!-- Kalkulasi info visited -->
            <?php
            $Qvisit = mysql_query("SELECT waktu FROM absensi");
            $totalvisit = mysql_num_rows($Qvisit);
            
            $jml_today = 0;
            $today = date("Y-m-d");

            while($data = mysql_fetch_array($Qvisit)){
              if($data['waktu']==$today)
              {
                $jml_today++;
              }
            }

            // <!-- Kalkulasi info visited end-->
            ?>
            <h3 style="padding-top: 20px;">Info Visitor</h3>
              <table border="1">
                <tr>
                  <th style="padding: 10px;">Hari ini </th>
                  <td style="padding: 10px;"><?php echo $jml_today?></td>
                  <!-- <td style="padding: 10px;"><?php echo $persen_pria;?>%</td> -->
                </tr>
                <tr>
                  <th style="padding: 10px;">Keseluruhan </th>
                  <td style="padding: 10px;"><?php echo $totalvisit;?></td>
                  <!-- <td style="padding: 10px;"><?php echo $persen_wanita;?>%</td> -->
                </tr>
              </table>  
        <!-- show data info visit end -->


        </div>
    </div>

    <!-- End Content -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
