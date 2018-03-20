<?php


include "core/init.php";

$mac = ambil_data_mac();
if (cek_mac_address($mac) && cek_verifikasi_mac($mac)){
  $_SESSION['emailLogin'] = ambil_data_email(ambil_data_idUser_mac($mac));
  require_once "core/autoload.php";
} elseif(cek_mac_address($mac) && cek_verifikasi_mac($mac) == false) {
  header('Location: check_email.php');
}

if(!isset($_SESSION['emailLogin'])){
    header('Location: login.php');
}

global $link;

$emailSession = $_SESSION['emailLogin'];
$query = "SELECT * FROM tb_user WHERE email ='$emailSession'";
$result = mysqli_query($link, $query)or die("ERROR ".mysql_error);

 // mysql_query()or die("Query lu bermasalah ".mysql_error);
$data = mysqli_fetch_array($result);
$nama = $data['nama'];
$profesi = $data['profesi'];
$perusahaan = $data['perusahaan'];
$keahlian = $data['keahlian'];
$kota = $data['kota'];
$nohp = $data['no_hp'];
$tgllhr= $data['tgl_lahir'];
$gender = $data['gender'];
$instagram = $data ['instagram'];
$linkedin = $data ['linkedln'];
$facebook = $data ['facebook'];
$foto= $data['foto'];


?>



<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Profile | Propeller - Admin Dashboard">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
<title>Profile | User Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="themes/images/favicon.ico">

<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<!-- Propeller css -->
<link rel="stylesheet" type="text/css" href="assets/css/propeller.min.css">

<link rel="stylesheet" type="text/css" href="components/file-upload/css/upload-file.css">
<link rel="stylesheet" type="text/css" href="components/file-upload/css/image-upload.css">

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="themes/css/propeller-theme.css" />

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="themes/css/propeller-admin.css">

</head>

<body>
<!-- Header Starts -->
<!--Start Nav bar -->
<br>
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth" >

	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<!-- <a href="javascript:void(0);" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons">menu</i></a> -->
		  <a style="padding-left: 50px" href="index.php" class="navbar-brand">
		    User Dashboard
		  </a>
		</div>

</nav><!--End Nav bar -->
<!-- Header Ends -->

<<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
	<ul class="nav pmd-sidebar-nav">

		<!-- User info -->
		<li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
				<div class="media-left" >
								<?php
       								//if else jika ada user yang belum upload foto
						       if(empty($foto)){
						       ?>
						        <img  width="50px" height="50px" src="themes/images/upload.jpg" alt="Kosong">
						       <?php
						       }else{
						       ?>
						        <img width="50px" height="50px" border:"10px" src="data:image/jpeg;base64, <?php echo base64_encode( $foto )?>" alt="image error">
						       <?php
						       }
						       ?>
					<!-- <img class="avatar" width="50px" height="50px" src="data:image/jpeg;base64, <?php echo base64_encode( $foto )?>" alt="Belum Ada Foto" > -->
				</div>
				<div class="media-body media-middle"><?php echo $nama;?></div>
				<div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
			</a>
			<ul class="dropdown-menu">
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li><!-- End user info -->

		<li>
			<a class="pmd-ripple-effect" href="index.php">
				<i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
	 xml:space="preserve">
<g>
	<path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
				<span class="media-body">User Dashboard</span>
			</a>
		</li>


		<li>
      <a class="pmd-ripple-effect" href="editprofile.php">
				<i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="12.706px" viewBox="0 0 18 12.706" enable-background="new 0 0 18 12.706" xml:space="preserve">
<path fill="#C9C8C8" d="M0,0v12.706h18V0H0z M12.706,4.235v3.176H9.108V4.235H12.706z M8.049,4.235v3.176h-6.99V4.235H8.049z
	 M1.059,8.47h6.99v3.177h-6.99V8.47z M9.108,11.647V8.47h3.599v3.177H9.108z M13.766,11.647V8.47h3.176v3.177H13.766z M16.942,7.412
	h-3.176V4.235h3.176V7.412L16.942,7.412z"/>
</svg></i>
				<span class="media-body">Edit Profile</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a>
		</li>
		<!-- <li>
			<a class="pmd-ripple-effect" href="data-absensi.php">
				<i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="18px" height="12.706px" viewBox="0 0 18 12.706" enable-background="new 0 0 18 12.706" xml:space="preserve">
<path fill="#C9C8C8" d="M0,0v12.706h18V0H0z M12.706,4.235v3.176H9.108V4.235H12.706z M8.049,4.235v3.176h-6.99V4.235H8.049z
	 M1.059,8.47h6.99v3.177h-6.99V8.47z M9.108,11.647V8.47h3.599v3.177H9.108z M13.766,11.647V8.47h3.176v3.177H13.766z M16.942,7.412
	h-3.176V4.235h3.176V7.412L16.942,7.412z"/>
</svg></i>
				<span class="media-body">Data Absensi</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a>

		</li> -->



	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->

<!--content area start-->
<div style="padding-top: 10px ; padding-left: 270px" id="content" class="pmd-content inner-page">

	<!--tab start-->
	<div class="container-fluid full-width-container about">
		<!-- Title -->

		<div class="page-content profile-edit dashboard">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">
					<div class="row">

						<div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
							<div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
								<?php
       								//if else jika ada user yang belum upload foto
						       if(empty($foto)){
						       ?>
						        <img src="themes/images/upload.jpg" alt="Kosong">
						       <?php
						       }else{
						       ?>
						        <img src="data:image/jpeg;base64, <?php echo base64_encode( $foto )?>" alt="image error">
						       <?php
						       }
						       ?>
							</div>
							<!-- <div class="action-button">
								<span class="btn btn-default btn-raised btn-file ripple-effect">
									<span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>
									<span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>
									<input type="file" name="...">
								</span>
								<a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
							</div> -->
						</div>

						<div class="col-lg-9 custom-col-9">
							<h1 class="" style="font-family: verdana"><strong><?php echo $nama;?></strong></h1>
							<h2 class="" style="font-family: courier"><?php echo ucwords($_SESSION['emailLogin'])?></h2>
							<br>
							<h3 class="heading">Personal Information</h3>
							<div class="row">
								<form class="form-horizontal">
								  <fieldset>
										<div class="form-group prousername pmd-textfield">
										  <label class="control-label col-sm-3">Nama</label>
										  <div class="col-sm-9">
										   <p class="form-control-static"><strong><?php echo $nama;?></strong></p>

										  </div>
										</div>
										<div class="form-group prousername pmd-textfield">
										  <label class="control-label col-sm-3">Tanggal Lahir</label>
										  <div class="col-sm-9">
										   <p class="form-control-static"><strong><?php echo $tgllhr;?></strong></p>

										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Gender</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo $gender;?></strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Profesi</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo $profesi;?></strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Perusahaan</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo $perusahaan;?></strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Keahlian</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo $keahlian;?></strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Kota</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo $kota;?></strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Email</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo ucwords($_SESSION['emailLogin'])?></strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">No Handphone</label>
										  <div class="col-sm-9">
											  <p class="form-control-static"><strong><?php echo $nohp;?></strong></p>
										  </div>
										</div>
								  </fieldset>
								</form>
							</div>
							<h3 class="heading">Social Media Account</h3>
							<div class="row">
								<form class="form-horizontal">
								  <fieldset>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="">Instagram</label>
										<div class="col-sm-9">
											<p class="form-control-static"><strong><?php echo $instagram;?></strong></p>
										</div>
									</div>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="">LinkedIn</label>
										<div class="col-sm-9">
											<p class="form-control-static"><strong><?php echo $linkedin;?></strong></p>
										</div>
									</div>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="">Facebook</label>
										<div class="col-sm-9">
											<p class="form-control-static"><strong><?php echo $facebook;?></strong></p>
										</div>
									</div>
									<!-- <div class="form-group btns">
									<div class="form-group btns margin-bot-30">
										  <div class="col-sm-9 col-sm-offset-3">
											<input type="button" value="Edit Profile" class="btn btn-primary pmd-ripple-effect" onclick="window.location.href='editprofile.php'"/>
											<input type="button" value="Logout"class="btn btn-default btn-link pmd-ripple-effect" onclick="window.location.href='logout.php'"/>
										  </div>
										</div>

									</div> -->
								  </fieldset>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- tab end -->

</div><!-- content area end -->

<!-- Footer Starts -->
<footer class="admin-footer">
 <div class="container-fluid">
 	<ul class="list-unstyled list-inline">
	 	<li>
			<span class="pmd-card-subtitle-text">Bandung Digital Valley &copy; <span class="auto-update-year"></span>. All Rights Reserved.</span>
			<h3 class="pmd-card-subtitle-text">Startup Incubator and Co-Working Space</h3>
        </li>

    </ul>
 </div>
</footer>
<!-- Footer Ends -->

<!-- Scripts Starts -->
<script src="assets/js/jquery-1.12.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/propeller.min.js"></script>
<script src="components/file-upload/js/upload-image.js"></script>
<script>
	$(document).ready(function() {
		var sPath=window.location.pathname;
		var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
		$(".pmd-sidebar-nav").each(function(){
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
			$(this).find("a[href='"+sPage+"']").addClass("active");
		});
		$(".auto-update-year").html(new Date().getFullYear());
	});
</script>

<!-- Scripts Ends -->

</body>
</html>
