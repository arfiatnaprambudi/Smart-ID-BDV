<?php
require_once("core/init.php");

global $link;
$email = $_GET['email'];
$query = "SELECT * FROM member_bdv WHERE email='$email'";
$result = mysqli_query($link, $query);
$data = mysqli_fetch_array($result);
$profesi = $data['profesi'];	
?>

<label for="profesi" align="left" style="color:#6D6F71">Profesi*</label>
	<select class="select-simple form-control pmd-select2" style="" name="profesi" id="profesi" required>
		<?php
			if($profesi=="student"){ 
		?>
		<option selected=""><?php echo ucwords($profesi);?></option>
		<option value="startup">Startup</option>
		<option value="freelance">Freelance</option>
		<?php 
			}elseif($profesi=="startup"){
		?>
		<option value="student">Student</option>
		<option selected=""><?php echo ucwords($profesi);?></option>
		<option value="freelance">Freelance</option>
		<?php
			}elseif($profesi=="freelance"){
		?>
		<option value="student">Student</option>
		<option value="startup">Startup</option>
		<option selected=""><?php echo ucwords($profesi);?></option>
		<?php
			}
		?>

		<!--  -->
		
	</select>