<?php 
include("koneksi.php");
$email=$_POST['emailLogin'];
$password=$_POST['passLogin'];
$enc_pass=sha1($password);

$Q = mysql_query("SELECT * FROM tb_adm where email='$email' and password='$enc_pass'") or die(mysql_error());
//$tampil = mysql_fetch_array($Q);
//$nimA = $tampilA['nim'];
//$namaA = $tampilA['nama'];
//$hak_aksesA = $tampilA['hak_akses'];

$count = mysql_num_rows($Q);
if($count==1){
session_start();
$_SESSION['email']=$email;
$_SESSION['pass']=$enc_pass;
?>
<script>
	document.location='index.php'
	</script>
<?php 
}else{ ?>
	<script>
		alert('Something Wrong!');
		document.location='login.php'
	</script>
<?php }?>