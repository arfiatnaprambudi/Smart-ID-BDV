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
          <h3>Add New Member</h3>
            <form method="POST" action="admin_input_userP.php">
              <table border="1" style="width: 100%">
                <tr>
                  <td style="padding: 20px;">
                    <table border="0" style="width: 100%">
                        <tr>
                            <td colspan="2"><h4 align="center" style="color:#231F20">Personal Info</h4>
                            </td>
                            <td style="padding-top: 10px;">
                                <h4 align="center" style="color:#231F20">Social Media (Opsional)</h4>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px;"><label for="nama" class="control-label" style="color:#6D6F71">
                                    Nama*
                                </label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </td>
                            <td style="padding-right: 15px;"><label for="tanggallahir" class="control-label" style="color:#6D6F71">
                                    Tanggal lahir*
                                </label>
                                <input type="date" name="tanggalLahir" id="datetimepicker-date" class="form-control" required>
                            </td>
                            <td>
                                
                                    <label for="instagram" class="control-label pmd-input-group-label" style="color:#6D6F71">Instagram</label>
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-instagram"></i></div>
                                    <input type="text" name="instagram" class="form-control" id="instagram">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px;"><label for="email" class="control-label" style="color:#6D6F71">
                                    E-mail*
                                </label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </td>
                            <td style="padding-right: 15px;"><label for="kota" class="control-label" style="color:#6D6F71">
                                    Kota*
                                </label>
                                <input type="text" name="kota" id="kota" class="form-control" required>
                            </td>
                            <td>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label for="linkedln" class="control-label pmd-input-group-label" style="color:#6D6F71">linkedln</label>
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-linkedin"></i></div>
                                    <input type="text" name="linkedln"class="form-control" id="linkedln">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px;"><label for="password" class="control-label" style="color:#6D6F71">
                                    Password*
                                </label>
                                <input type="password" name="pass" id="pass" class="form-control" required>
                            </td>
                            <td style="padding-right: 15px;"><label for="regular1" class="control-label" style="color:#6D6F71">
                                 Nomor Handphone*
                               </label>
                               <input type="tel" name="noHp" id="nohp" class="form-control" required>
                            </td>
                            <td>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label for="facebook" class="control-label pmd-input-group-label" style="color:#6D6F71">facebook</label>
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                    <input type="text" name="facebook" class="form-control" id="facebook">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px;"><label for="mac" class="control-label" style="color:#6D6F71">
                                    MAC address*
                                </label>
                                <input type="text" name="mac" id="mac" class="form-control" required>
                            </td>
                            <td style="padding-right: 15px;"><label for="profesi" align="left" style="color:#6D6F71">Profesi*</label>
                                <select class="select-simple form-control pmd-select2" style="width: 100%;" name="profesi" id="profesi" required>

                                    <option></option>
                                    <option value="student">Student</option>
                                    <option value="startup">Startup</option>
                                    <option value="freelance">Freelance</option>
                                    </select>
                            </td>
                            <td align="right">
                                <button type="submit" name="submit" class="btn btn-primary next" style="background-color:#2ca8e0">Submit</button>
          <a href="admin_view.php" class="btn btn-default">Cancel</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px;padding-top: 10px;">
                                <label for="gender" class="control-label" style="color:#6D6F71">
                                    Gender*
                                </label>
                                    <div class="radio">
                                        <label class="pmd-radio pmd-radio-ripple-effect">
                                            <input type="radio" name="gender" id="pria" value="pria">
                                            <span for="gender">Pria</span> </label>
                                    </div>
                                    <div class="radio radio-margin">
                                        <label class="pmd-radio pmd-radio-ripple-effect">
                                            <input type="radio" name="gender" id="wanita" value="wanita">
                                            <span for="gender">Wanita</span> </label>
                                    </div>
                            </td>
                            <td style="padding-right: 15px;"><label for="perusahaan" class="control-label" style="color:#6D6F71">
                                    Nama Perusahaan*
                                </label>
                                <input type="text" name="perusahaan" id="perusahaan" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px;">
                                <label for="keahlian" align="left" style="color:#6D6F71">Keahlian*</label>
                                <select class="select-simple form-control pmd-select2" style="width: 100%;" onchange="if
                                    (this.value=='other'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};" name="keahlian" id="keahlian" required>
                                    <option></option>
                                    <option value="webdev">Web Development</option>
                                    <option value="graphdes">Graphic Design</option>
                                    <option value="digmar">Digital Marketing</option>
                                    <option value="gamedev">Game Develop</option>
                                    <option value="mobdev">Mobile Develop</option>
                                    <option value="itpro">IT Programmer</option>
                                    <option value="itbiz">IT Business</option>
                                    <option value="other">Other</option>
                                    </select>
                            </td>
                            <td style="padding-top: 25px;">
                                <input type="text" name="other" class="form-control" style="visibility:hidden;" placeholder="Keahlian Lainnya ..">
                            </td>
                        </tr>
                    </table>
                  </td>
                </tr>
              </table>
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
