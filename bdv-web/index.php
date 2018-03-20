<?php
header('Location: admin_view.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Member</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

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
        <div class="col-md-6 col-md-offset-3">
          <h2> Form Registrasi </h2>

          <form>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="Nama" placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="gender"> Gender </label> <br>
              <label class="radio-inline">
                <input type="radio" name="gender" id="pria" value="pria"> Pria
              </label>
              <label class="radio-inline">
                <input type="radio" name="gender" id="wanita" value="wanita"> Wanita
              </label>
            </div>
           <div class="form-group">
             <label for="tanggallahir">Tanggal Lahir</label> <br>
             <input type="date" id="tanggallahir">
           </div>
           <div class="form-group">
             <label for="kota">Kota</label>
             <input type="text" class="form-control" id="kota" placeholder="Kota">
           </div>
           <div class="form-group">
             <label for="email">Email</label>
             <input type="email" class="form-control" id="email" placeholder="Email">
           </div>
           <div class="form-group">
             <label for="nohp">Nomor Hp</label>
             <input type="number" class="form-control" id="nohp" placeholder="Ex: 081122334455">
           </div>
           <div class="form-group">
             <label for="profesi">Profesi</label>
             <select class="form-control">
               <option>Student</option>
               <option>Startup</option>
               <option>Freelance</option>
             </select>
           </div>
           <div class="form-group">
             <label for="keahlian">Keahlian</label>
             <select class="form-control">
               <option>Web Develop</option>
               <option>Graphic Design</option>
               <option>Digital Marketing</option>
               <option>Game Develop</option>
               <option>Mobile Develop</option>
               <option>IT Prog</option>
               <option>IT Business</option>
               <option>Other</option>
             </select>
           </div>
           <div class="form-group">
             <label for="perusahaan">Perusahaan</label>
             <input type="text" class="form-control" id="perusahaan" placeholder="Perusahaan">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
          </form>

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
