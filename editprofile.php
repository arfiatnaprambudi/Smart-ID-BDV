<?php


include "core/init.php";

if(!isset($_SESSION['emailLogin'])){
    header('Location: login.php');
}

global $link;

$emailSession = $_SESSION['emailLogin'];
$query = "SELECT * FROM tb_user WHERE email ='$emailSession'";
$result = mysqli_query($link, $query)or die("ERROR ".mysql_error);
$data = mysqli_fetch_array($result);

$nama = $data['nama'];
$profesi = $data['profesi'];
$perusahaan = $data['perusahaan'];
$keahlian = $data['keahlian'];
$kota = $data['kota'];
$nohp = $data['no_hp'];
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
<title>Profile | Edit Profile</title>
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
		  <a style="padding-left: 50px" class="navbar-brand">
		    Edit Profile
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
<div  style="padding-top: 10px ; padding-left: 270px" id="content" class="pmd-content inner-page">

	<!--tab start-->
	<div class="container-fluid full-width-container about">
		<!-- Title -->

		<div class="page-content profile-edit dashboard">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">
					<div class="row">
						<form class="form-horizontal" action="edit.php" method="post" enctype="multipart/form-data" >

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
							<div class="action-button">
								<span class="btn btn-default btn-raised btn-file ripple-effect">
									<span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>
									<span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>
									<input type="file" name="foto">
								</span>
								<a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
							</div>
						</div>

						<div class="col-lg-9 custom-col-9">
							<h3 class="heading">Edit Your Profile</h3>
							<div class="row">

								<!-- <form method="POST" action="pengiklan_input_dataP.php" enctype="multipart/form-data"> -->
								  <fieldset>
										<div class="form-group prousername pmd-textfield">
										  <label class="control-label col-sm-3">Nama</label>
										  <div class="col-sm-9">
										   <p class="form-control-static" name"nama" ><strong><?php echo ucwords($data['nama'])?></strong></p>

										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Profesi</label>
										  <div class="col-sm-9">
											 <select class="select-simple form-control pmd-select2" style="width: 100%;" name="profesi" id="profesi" required>

		                                    <?php
		                                        if($profesi=="student")
		                                        {
		                                    ?>
		                                    <option value="student" selected=""><?php echo ucwords($profesi);?></option>
		                                    <option value="startup">Startup</option>
		                                    <option value="freelance">Freelance</option>
		                                    <?php
		                                        }
		                                        elseif($profesi=="startup")
		                                        {
		                                    ?>
		                                    <option value="student">Student</option>
		                                    <option value="startup" selected=""><?php echo ucwords($profesi);?></option>
		                                    <option value="freelance">Freelance</option>
		                                    <?php
		                                        }
		                                        elseif($profesi=="freelance")
		                                        {
		                                    ?>
		                                    <option value="student">Student</option>
		                                    <option value="startup">Startup</option>
		                                    <option value="freelance" selected=""><?php echo ucwords($profesi);?></option>
		                                    <?php
		                                        }else
		                                        {
		                                    ?>
		                                    <option value=""></option>
		                                    <option value="student">Student</option>
		                                    <option value="startup">Startup</option>
		                                    <option value="freelance">Freelance</option>
		                                    <?php
		                                        }
		                                    ?>
		                                	 </select>

										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Perusahaan</label>
										  <div class="col-sm-9">
											  <input type="text" class="form-control empty" name="perusahaan" value="<?php echo $perusahaan;?>">
										  </div>
										</div>
										<div class="form-group prousername pmd-textfield">
										  <label class="control-label col-sm-3">Keahlian</label>
										  <div class="col-sm-9">
											<select class="select-simple form-control pmd-select2" style="width: 100%;" name="keahlian" id="profesi" onchange="if
                          (this.value=='other'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};" name="keahlian" id="keahlian" required>
                          <?php
                              if($keahlian=="Web Development")
                              {
                          ?>
                          <option selected="" value="Web Development">Web Development</option>
                          <option value="Graphic Design">Graphic Design</option>
						  <option value="Digital Marketing">Digital Marketing</option>
						  <option value="Game Develop">Game Develop</option>
						  <option value="Mobile Develop">Mobile Develop</option>
						  <option value="IT Programmer">IT Programmer</option>
						  <option value="IT Business">IT Business</option>
						  <option value="other">Other</option>
                          <?php
                              }
                              elseif ($keahlian=="Graphic Design")
                              {
                          ?>
                          <option value="Web Development">Web Development</option>
                          <option selected="" value="Graphic Design">Graphic Design</option>
                          <option value="Digital Marketing">Digital Marketing</option>
                          <option value="Game Develop">Game Develop</option>
                          <option value="Mobile Develop">Mobile Develop</option>
                          <option value="IT Programmer">IT Programmer</option>
                          <option value="IT Business">IT Business</option>
                          <option value="other">Other</option>
                          <?php
                              }elseif ($keahlian=="Digital Marketing")
                              {
                          ?>
                          <option value="Web Development">Web Development</option>
                          <option value="Graphic Design">Graphic Design</option>
                          <option selected="" value="Digital Marketing">Digital Marketing</option>
                          <option value="Game Develop">Game Develop</option>
                          <option value="Mobile Develop">Mobile Develop</option>
                          <option value="IT Programmer">IT Programmer</option>
                          <option value="IT Business">IT Business</option>
                          <option value="other">Other</option>
                          <?php
                              }elseif ($keahlian=="Mobile Develop")
                              {
                          ?>
                          <option value="Web Development">Web Development</option>
                          <option value="Graphic Design">Graphic Design</option>
                          <option value="Digital Marketing">Digital Marketing</option>
                          <option value="Game Develop">Game Develop</option>
                          <option selected="" value="Mobile Develop">Mobile Develop</option>
                          <option value="IT Programmer">IT Programmer</option>
                          <option value="IT Business">IT Business</option>
                          <option value="other">Other</option>
                          <?php
                              }elseif ($keahlian=="IT Programmer")
                              {
                          ?>
                          <option value="Web Development">Web Development</option>
                          <option value="Graphic Design">Graphic Design</option>
                          <option value="Digital Marketing">Digital Marketing</option>
                          <option value="Game Develop">Game Develop</option>
                          <option value="Mobile Develop">Mobile Develop</option>
                          <option selected="" value="IT Programmer">IT Programmer</option>
                          <option value="IT Business">IT Business</option>
                          <option value="other">Other</option>
                          <?php
                              }elseif ($keahlian=="IT Business")
                              {
                          ?>
                          <option value="Web Development">Web Development</option>
                          <option value="Graphic Design">Graphic Design</option>
                          <option value="Digital Marketing">Digital Marketing</option>
                          <option value="Game Develop">Game Develop</option>
                          <option value="Mobile Develop">Mobile Develop</option>
                          <option value="IT Programmer">IT Programmer</option>
                          <option selected="" value="IT Business">IT Business</option>
                          <option value="other">Other</option>
                          <?php
                              }else
                              {
                          ?>
                          <option value="<?php echo $keahlian;?>"><?php echo $keahlian;?></option>
                          <option value="Web Development">Web Development</option>
                          <option value="Graphic Design">Graphic Design</option>
                          <option value="Digital Marketing">Digital Marketing</option>
                          <option value="Game Develop">Game Develop</option>
                          <option value="Mobile Develop">Mobile Develop</option>
                          <option value="IT Programmer">IT Programmer</option>
                          <option value="IT Business">IT Business</option>
                          <option value="other">Other</option>
                          <?php
                              }
                          ?>

                          </select>
                          <input type="text" name="other" class="form-control" style="visibility:hidden;" placeholder="Keahlian Lainnya ..">
										  </div>
										</div>

										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Kota</label>
										  <div class="col-sm-9">
											  <input type="text" class="form-control empty" name="kota" value="<?php echo $kota;?>">
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Email</label>
										  <div class="col-sm-9">
										  	  <input type="text" class="form-control empty" name="email" value="<?php echo ucwords($_SESSION['emailLogin'])?>" readonly>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">No Handphone</label>
										  <div class="col-sm-9">
											  <input type="text" class="form-control empty" name="no_hp" value="<?php echo $nohp;?>">
										  </div>
										</div>
										<br>


							<h3 class="heading">Social Media Account</h3>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="u_password">Instagram</label>
										<div class="col-sm-9">
											<input type="text" class="form-control empty" name="instagram" value="<?php echo $instagram;?>">
										</div>
									</div>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="u_password">LinkedIn</label>
										<div class="col-sm-9">
											<input type="text" class="form-control empty" name="linkedln" value="<?php echo $linkedin;?>">
										</div>
									</div>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="u_password">Facebook</label>
										<div class="col-sm-9">
											<input type="text" class="form-control empty" name="facebook" value="<?php echo $facebook;?>">
										</div>
									</div>
<br>
									<div class="form-group btns margin-bot-30">
										  <div class="col-sm-9 col-sm-offset-3">
											<input type="submit" value="Update" name="tedit" class="btn btn-primary pmd-ripple-effect">
											<input type="button" value="Cancel" class="btn btn-default btn-link pmd-ripple-effect" onclick="window.location.href='index.php'"/>
											<!-- <button class="btn btn-default btn-link pmd-ripple-effect">Cancel</button> -->
										  </div>
										</div>

									<!-- <br>
									<br>
									<input type="button" value="Back To Profile"class="btn btn-primary pmd-ripple-effect" onclick="window.location.href='index.php'"/> -->
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
