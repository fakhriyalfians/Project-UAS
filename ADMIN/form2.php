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


<?php
    include "includes/config.php";

    if(isset($_POST['Simpan']))
    {
        if(isset($_REQUEST['inputprovID']))
        {
            $provinsiID = $_REQUEST['inputprovID'];
        }
        
        if(!empty($provinsiID))
        {
            $provinsiID = $_POST['inputprovID'];
        }
        else {
            die ("Anda harus memasukkan ID Provinsi");
        }

        $provinsiNama = $_POST['inputprovNama'];
        $provinsiTglBerdiri = $_POST['inputTgl'];

        mysqli_query($connection, "insert into provinsi values ('$provinsiID', '$provinsiNama',
        '$provinsiTglBerdiri')");

        header("location:form2.php");
    }

    $datakategori = mysqli_query($connection, "select * from kategori");
    $dataarea = mysqli_query($connection, "select * from area");
    $dataprovinsi = mysqli_query($connection, "select * from provinsi");
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Provinsi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="row">
<div class="col-sm-1"></div>
  <div class="col-sm-10">
  <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"> Input Area Provinsi Wisata </h1>
                </div>
            </div> <!--penutup jumbotron-->
  <form method="POST">

  <div class="form-group row">
    <label for="kodeprovinsi" class="col-sm-2 col-form-label">Provinsi ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodeprovinsi" name="inputprovID" placeholder="ID Provinsi" >
    </div>
  </div>

  <div class="form-group row">
    <label for="provinsinama" class="col-sm-2 col-form-label">Nama Provinsi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="provinsinama" name="inputprovNama" placeholder="Nama Provinsi" >
    </div>
  </div>

  <div class="form-group row">
    <label for="tglberdiri" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tglberdiri" name="inputTgl" placeholder="dd-mm-yyyy" >
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
     <input type="submit" class="btn btn-primary" value="Simpan"name="Simpan" >
     <input type="button" class="btn btn-secondary" value="batal"name="batal">

     
    </div>
  </div>
</form>
</div>


<div class="col-sm-1"></div>
</div>

<!--- tabel destinais-->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"> Daftar Area Provinsi Wisata </h1>
                    <h2> Hasil entri data pada Tabel Provinsi </h2>
                </div>
            </div> <!--penutup jumbotron-->

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama Destinasi</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
                        placeholder="cari Provinsi">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
                </div>
            </form>

        <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                     <th>No</th>
                    <th>Provinsi ID</th>
                    <th>Nama Provinsi</th>
                    <th>Tanggal Berdiri</th>
                    <th colspan="2" style="text-align: center;">Action</th>
                </tr>

            </thead>

            <tbody>
            <?php 
            if(isset($_POST["kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select *
                from provinsi
                where provinsiNama like '%".$search."%'");
            }else
                {
                    $query = mysqli_query($connection, "select *
                    from provinsi");
                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td> <?php echo $nomor;?></td>
                        <td> <?php echo $row['provinsiID'];?></td>
                        <td> <?php echo $row['provinsiNama'];?></td>
                        <td> <?php echo $row['provinsiTglBerdiri'];?></td>
						<td>
							<a href="fotodestinasiubah.php?ubahfoto=<?php echo $row['provinsiID']?>" class="btn btn-success btn-sm" title="EDIT">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
							</a>
						</td>
						<td>
							<a href="fotodestinasihapus.php?hapusfoto=<?php echo $row['provinsiID']?>" class="btn btn-danger btn-sm" title="DELETE">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
							</a>
						</td>

                    </tr>
                    <?php $nomor = $nomor + 1;?>
               <?php } ?>
            </tbody>
        </table>


        </div>
        <div class="col-sm-1"></div>
    </div>
    <script type="text/javascript" scr="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#kodekategori').select2({
            allowClear: true,
            placeholder: "Pilih kategori Wisata"

        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#kodearea').select2({
            allowClear: true,
            placeholder: "Pilih Area Wisata"

        });
    });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsiarea').select2({
            allowClear: true,
            placeholder: "Pilih Area Provinsi"

        });
    });
    </script>


  </body>
  </div>
    </div> <!--penutup container-fluid-->

    <?php include "footer.php";?>
    <?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>