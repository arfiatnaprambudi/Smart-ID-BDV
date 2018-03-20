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
            <td><a href="#">Member</a></td>
          </tr>
          <tr>
            <td><a href="admin_absensi.php">Absensi</a></td>
          </tr>
        </table>
          <h3>Data BDV Membership</h3>
                <table align="right">
                  <tr>
                    <td style="padding-top: 10px;"><a href="admin_input_user.php" style="color: white;"><button type="submit" class="btn btn-primary">Daftar User</button></a></td>
                  </tr>
                </table>
            <form name="Search Form" method="GET">
                <table align="right">
                  <tr>
                    <td style="padding: 10px">
                      <select name="searchby" required style="height: 25px;">
                        <option value="">- Search by -</option>
                        <option value="nama">Nama</option>
                        <option value="profesi">Profesi</option>
                        <option value="perusahaan">Perusahaan</option>
                        <option value="email">Email</option>
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
                      <td ><label>Email </label></td>
                      <td style="width: 13%;"></td>
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
                      
                      $query = mysql_query("SELECT * FROM member_bdv WHERE $searchby LIKE '%$searchdata%' LIMIT $start, $limit");

                    //Qsum query mencari jumlah data
                      $Qsum = mysql_query("SELECT * FROM member_bdv WHERE $searchby LIKE '%$searchdata%'");
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
                      $query = mysql_query("SELECT * FROM member_bdv LIMIT $start, $limit");

                    //Qsum query mencari jumlah data
                      $Qsum = mysql_query("SELECT * FROM member_bdv");
                    }

                      $sumdata = mysql_num_rows($Qsum);
                        while ($data=mysql_fetch_array($query))
                        {
                          $name = $data['nama'];  
                          $profesi = $data['profesi'];
                          $perusahaan = $data['perusahaan'];
                          $email = $data['email'];
                    ?>
                  <tr align="center">
                      <td><?php echo $name;?></td>
                      <td style="padding: 10px"><?php echo ucwords($profesi);?></td>
                      <td style="padding: 10px"><?php echo $perusahaan;?></td>
                      <td style="padding: 10px"><?php echo $email;?></td>
                      <td style="padding: 10px">
                      <a href="admin_update_user.php?email=<?php echo $email;?>" style="color: white;"><img title="update data" alt="Update data" src="img/edit.png" style="width: 30px;height: 30px"></a>
                      <a href="admin_view_detail.php?email=<?php echo $email;?>" style="color: white;"><img title="view data" alt="View data" src="img/detail.png" style="width: 40px;height: 40px"></a>
                      </td>
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
      <!-- show data info profesi -->
      <div class="col-md-2 col-md-offset-2">
            <!-- Kalkulasi info gender -->
            <?php
            $Qgender = mysql_query("SELECT gender FROM member_bdv");
            $totalgender = mysql_num_rows($Qgender);
            $jml_pria = 0;
            $jml_wanita = 0;

            while($data = mysql_fetch_array($Qgender)){
              if($data['gender']=="pria")
              {
                $jml_pria++;
              }else
              {
                $jml_wanita++;
              }
            }

            $persen_pria = round(($jml_pria/$totalgender)*100);
            $persen_wanita = round(($jml_wanita/$totalgender)*100);
            $persen_total = 100;

            // <!-- Kalkulasi info gender end-->
            ?>
            <h3 style="padding-top: 20px;">Info Gender</h3>
              <table border="1">
                <tr>
                  <th style="padding: 10px;">Pria </th>
                  <td style="padding: 10px;"><?php echo $jml_pria?></td>
                  <td style="padding: 10px;"><?php echo $persen_pria;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Wanita </th>
                  <td style="padding: 10px;"><?php echo $jml_wanita;?></td>
                  <td style="padding: 10px;"><?php echo $persen_wanita;?>%</td>
                </tr>
              </table>  
        <!-- show data info gender end -->

        <!-- show data info profesi -->
            <!-- Kalkulasi info profesi -->
            <?php
            $Qprofesi = mysql_query("SELECT profesi FROM member_bdv");
            $totalprofesi = mysql_num_rows($Qprofesi);
            $jml_student = 0;
            $jml_startup = 0;
            $jml_freelance = 0;

            while($data = mysql_fetch_array($Qprofesi))
            {
              if($data['profesi']=="student"){$jml_student++;}
              elseif ($data['profesi']=="startup"){$jml_startup++;}
              elseif ($data['profesi']=="freelance"){$jml_freelance++;}
            }

            $persen_student = round(($jml_student/$totalprofesi)*100);
            $persen_startup = round(($jml_startup/$totalprofesi)*100);
            $persen_freelance = round(($jml_freelance/$totalprofesi)*100);
            $persen_total = 100;

            // <!-- Kalkulasi info grafis gender end-->
            ?>
        
            <h3 style="padding-top: 20px;">Info Profesi</h3>
              <table border="1">
                <tr>
                  <th style="padding: 10px;">Student </th>
                  <td style="padding: 10px;"><?php echo $jml_student;?></td>
                  <td style="padding: 10px;"><?php echo $persen_student;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Startup </th>
                  <td style="padding: 10px;"><?php echo $jml_startup;?></td>
                  <td style="padding: 10px;"><?php echo $persen_startup;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Freelance </th>
                  <td style="padding: 10px;"><?php echo $jml_freelance;?></td>
                  <td style="padding: 10px;"><?php echo $persen_freelance;?>%</td>
                </tr>
              </table>
        </div><!-- show data info profesi end -->

        <!-- show data info keahlian -->
        <div class="col-md-3 col-md-offset-0" style="padding-left: 30px;">
            <!-- Kalkulasi info keahlian -->
            <?php
            $Qkeahlian = mysql_query("SELECT keahlian FROM member_bdv");
            $totalkeahlian = mysql_num_rows($Qkeahlian);
            $jml_webdev = 0;
            $jml_graphdes = 0;
            $jml_digmar = 0;
            $jml_gamedev = 0;
            $jml_mobdev = 0;
            $jml_itpro = 0;
            $jml_itbiz = 0;
            $jml_other = 0;

            while($data = mysql_fetch_array($Qkeahlian))
            {
              if($data['keahlian']=="webdev"){$jml_webdev++;}
              elseif ($data['keahlian']=="graphdes"){$jml_graphdes++;}
              elseif ($data['keahlian']=="digmar"){$jml_digmar++;}
              elseif ($data['keahlian']=="gamedev"){$jml_gamedev++;}
              elseif ($data['keahlian']=="mobdev"){$jml_mobdev++;}
              elseif ($data['keahlian']=="itpro"){$jml_itpro++;}
              elseif ($data['keahlian']=="itbiz"){$jml_itbiz++;}
              else{$jml_other++;}
            }

            $persen_webdev = round(($jml_webdev/$totalkeahlian)*100);
            $persen_graphdes = round(($jml_graphdes/$totalkeahlian)*100);
            $persen_digmar = round(($jml_digmar/$totalkeahlian)*100);
            $persen_gamedev = round(($jml_gamedev/$totalkeahlian)*100);
            $persen_mobdev = round(($jml_mobdev/$totalkeahlian)*100);
            $persen_itpro = round(($jml_itpro/$totalkeahlian)*100);
            $persen_itbiz = round(($jml_itbiz/$totalkeahlian)*100);
            $persen_other = round(($jml_other/$totalkeahlian)*100);
            $persen_total = 100;

            // <!-- Kalkulasi info grafis keahlian end-->
            ?>
        
            <h3 style="padding-top: 20px;">Info Keahlian</h3>
              <table border="1">
                <tr>
                  <th style="padding: 10px;">Web Developer </th>
                  <td style="padding: 10px;"><?php echo $jml_webdev;?></td>
                  <td style="padding: 10px;"><?php echo $persen_webdev;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Graphic Design </th>
                  <td style="padding: 10px;"><?php echo $jml_graphdes;?></td>
                  <td style="padding: 10px;"><?php echo $persen_graphdes;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Digital Marketing </th>
                  <td style="padding: 10px;"><?php echo $jml_digmar;?></td>
                  <td style="padding: 10px;"><?php echo $persen_digmar;?>%</td>
                </tr> 
                <tr>
                  <th style="padding: 10px;">Game Developer </th>
                  <td style="padding: 10px;"><?php echo $jml_gamedev;?></td>
                  <td style="padding: 10px;"><?php echo $persen_gamedev;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Mobile Developer </th>
                  <td style="padding: 10px;"><?php echo $jml_mobdev;?></td>
                  <td style="padding: 10px;"><?php echo $persen_mobdev;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">IT Programmer </th>
                  <td style="padding: 10px;"><?php echo $jml_itpro;?></td>
                  <td style="padding: 10px;"><?php echo $persen_itpro;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">IT Business </th>
                  <td style="padding: 10px;"><?php echo $jml_itbiz;?></td>
                  <td style="padding: 10px;"><?php echo $persen_itbiz;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">Other </th>
                  <td style="padding: 10px;"><?php echo $jml_other;?></td>
                  <td style="padding: 10px;"><?php echo $persen_other;?>%</td>
                </tr>
              </table>
        </div><!-- show data info profesi end -->

        <!-- show data info Usia -->
        <div class="col-md-3 col-md-offset-0" style="padding-left: 30px;">
            <!-- Kalkulasi info usia -->
            <?php
            $Qusia = mysql_query("SELECT YEAR(CURRENT_TIMESTAMP) - YEAR(tanggalLahir) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(tanggalLahir, 5)) as age 
  FROM member_bdv");
            $usia1822 = 0 ;
            $usia2326 = 0 ;
            $usia2735 = 0 ;
            $usia36keatas = 0 ;
            $totalpegawai = mysql_num_rows($Qusia);

            while($data = mysql_fetch_array($Qusia)){
              $usia = $data['age'];

              if(($usia >= 18 )&&($usia <= 22 ))
              {
                $usia1822++;
              }
              elseif (($usia >= 23 )&&($usia <= 26 )) {
                $usia2326++;
              }
              elseif (($usia >= 27 )&&($usia <= 35 )) {
                $usia2735++;
              }elseif ( $usia >= 36 ) {
                $usia36keatas++;
              } 
            }
            
            $persen_usia1822 = round(($usia1822/$totalpegawai)*100);
            $persen_usia2326 = round(($usia2326/$totalpegawai)*100);
            $persen_usia2735 = round(($usia2735/$totalpegawai)*100);
            $persen_usia36keatas = round(($usia36keatas/$totalpegawai)*100);

            $persen_total = 100;

            // <!-- Kalkulasi info grafis usia end-->
            ?>            
            <h3 style="padding-top: 20px;">Info Usia </h3>
              <table border="1">
                <tr>
                  <th style="padding: 10px;">18-22 tahun </th>
                  <td style="padding: 10px;"><?php echo $usia1822;?></td>
                  <td style="padding: 10px;"><?php echo $persen_usia1822;?>%</td>
                </tr>
                <tr>  
                  <th style="padding: 10px;">23-26 tahun </th>
                  <td style="padding: 10px;"><?php echo $usia2326;?></td>
                  <td style="padding: 10px;"><?php echo $persen_usia2326;?>%</td>
                </tr>
                <tr>
                  <th style="padding: 10px;">27-35 tahun </th>
                  <td style="padding: 10px;"><?php echo $usia2735;?></td>
                  <td style="padding: 10px;"><?php echo $persen_usia2735;?>%</td>
                </tr> 
                <tr>
                  <th style="padding: 10px;"> > 36 tahun </th>
                  <td style="padding: 10px;"><?php echo $usia36keatas;?></td>
                  <td style="padding: 10px;"><?php echo $persen_usia36keatas;?>%</td>
                </tr>
              </table>

      </div><!-- row -->
    </div>

    <!-- End Content -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
