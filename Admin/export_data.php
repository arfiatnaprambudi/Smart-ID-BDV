<?php
include("ses.php");
?>
<title>BDV Admin Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="../themes/images/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="tableExport-jquery-plugin-code/tableExport.js"></script>
<script type="text/javascript" src="tableExport-jquery-plugin-code/jquery.base64.js"></script>
<script type="text/javascript" src="tableExport-jquery-plugin-code/html2canvas.js"></script>
<script type="text/javascript" src="tableExport-jquery-plugin-code/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="tableExport-jquery-plugin-code/jspdf/jspdf.js"></script>
<script type="text/javascript" src="tableExport-jquery-plugin-code/jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
include("koneksi.php");
if(isset($_GET['absensi'])){
	$qry = "SELECT a.nama, a.email, a.profesi, c.tgl_akses FROM tb_user a, tb_mac_address b, tb_logs c WHERE a.id_user = b.id_user AND b.mac_address = c.mac_address";	
}elseif (isset($_GET['member'])) {
	$qry = "SELECT * FROM tb_user";	
}

$result = mysql_query($qry);

$records = array();
 
 while($row = mysql_fetch_assoc($result)){ 
    $records[] = $row;
  }
?>
<div class="container">
	<div class="row">
		<div class="btn-group pull-right" style=" padding: 10px;">
			<div class="dropdown">
			  <?php
				if(isset($_GET['absensi'])){
			  ?> 
			     <a href="data-absensi.php">
			     	<button class="btn btn-default" type="button">Back</button>
			     </a>
			  <?php
				}
				elseif (isset($_GET['member']))
				{
		      ?>
		      	 <a href="data-member.php">
		      	 	<button class="btn btn-default" type="button">Back</button>
		      	 </a>
		      <?php 
	            }
	          ?>
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			     <span class="glyphicon glyphicon-th-list"></span> Format Export
			   
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <li><a href="#" onclick="$('#data').tableExport({type:'json',escape:'false'});"> <img src="tableExport-jquery-plugin-code/images/json.jpg" width="24px"> JSON</a></li>
				<li><a href="#" onclick="$('#data').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="tableExport-jquery-plugin-code/images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>
				<li><a href="#" onclick="$('#data').tableExport({type:'json',escape:'true'});"> <img src="tableExport-jquery-plugin-code/images/json.jpg" width="24px"> JSON (with Escape)</a></li>
				<li class="divider"></li>
				<li><a href="#" onclick="$('#data').tableExport({type:'excel',escape:'false'});"> <img src="tableExport-jquery-plugin-code/images/xls.png" width="24px"> XLS</a></li>
				<li class="divider"></li>
				<li><a href="#" onclick="$('#data').tableExport({type:'png',escape:'false'});"> <img src="tableExport-jquery-plugin-code/images/png.png" width="24px"> PNG</a></li>
				<li><a href="#" onclick="$('#data').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="tableExport-jquery-plugin-code/images/pdf.png" width="24px"> PDF</a></li>
											
			  </ul>
			</div>
		</div>
	</div>	
	<div class="row" style="height:300px;overflow:scroll;">
	    <table id="data" class="table table-striped">
	        <thead>
		        <?php
				if(isset($_GET['absensi'])){
				?>
	            <tr class="warning">
	            	<th colspan="4"> Data Absensi </th>
            	</tr>
			    <tr class="warning">
	                <th>Nama</th>
	                <th>Email</th>
	                <th>Profesi</th>
	                <th>Tanggal Kunjungan</th>
	            </tr>
		        <?php
				}
				elseif (isset($_GET['member']))
				{
		        ?>
		        <tr class="warning">
			        <th colspan="4"> Data Member </th>
			    </tr>
			    <tr class="warning">
	                <th>Nama</th>
	                <th>Profesi</th>
	                <th>Perusahaan</th>
	                <th>Email</th>
	            </tr>
	            <?php 
	            }
	            ?>
	        </thead>
	        <tbody>
	        <?php foreach($records as $rec):?>
		        <?php
				if(isset($_GET['absensi'])){
				?>
	            <tr>
	                <td><?php echo $rec['nama']?></td>
	                <td><?php echo $rec['email']?></td>
	                <td><?php echo $rec['profesi']?></td>
	                <td><?php echo $rec['tgl_akses']?></td>
	            </tr>
	            <?php
				}
				elseif (isset($_GET['member']))
				{
		        ?>
		        <tr>
	                <td><?php echo $rec['nama']?></td>
	                <td><?php echo $rec['profesi']?></td>
	                <td><?php echo $rec['perusahaan']?></td>
	                <td><?php echo $rec['email']?></td>
	            </tr>
	            <?php 
	            }
	            ?>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	</div>
</div>
<script type="text/javascript">
//$('#employees').tableExport();
$(function(){
	$('#example').DataTable();
      }); 
</script>