<!DOCTYPE html>

<?php
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
    header("location:login.php");

?>


    <?php include "header.php";?>

    <div class="container-fluid">
        <div class="card shadow mb-4">

        <div class="row">
	<div class="col-sm-1"></div>

	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
                    <h1 class="display-4"> Profile </h1>
                </div>
            </div> <!--penutup jumbotron-->
  <form method="POST">

  <div class="form-group row">
    <label for="namaarea" class="col-sm-2 col-form-label">NIM </label>
    <div class="col-sm-10">
      <p type="text" class="form-control" id="namaarea" name="inputnama" placeholder="Nama kecamatan">825200073</p>
    </div>
  </div>

  <div class="form-group row">
    <label for="namaarea" class="col-sm-2 col-form-label">Nama </label>
    <div class="col-sm-10">
      <p type="text" class="form-control" id="namaarea" name="inputnama" placeholder="Nama kecamatan">Fakhri Yusuf Alfiansyah</p>
    </div>
  </div>
  <div class="form-group row">
    <label for="namaarea" class="col-sm-2 col-form-label">Kelas </label>
    <div class="col-sm-10">
      <p type="text" class="form-control" id="namaarea" name="inputnama" placeholder="Nama kecamatan">Sistem Informasi B 2020</p>
    </div>
  </div>
  <div class="form-group row">
    <label for="namaarea" class="col-sm-2 col-form-label">Kontak </label>
    <div class="col-sm-10">
      <p type="text" class="form-control" id="namaarea" name="inputnama" placeholder="Nama kecamatan">082128811137</p>
    </div>
  </div>



     
    </div>
  </div>
</form>
</div>

<div class="col-sm-1"></div>
</div>
        </div>
    </div> <!--penutup container-fluid-->

    <?php include "footer.php";?>
    <?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>