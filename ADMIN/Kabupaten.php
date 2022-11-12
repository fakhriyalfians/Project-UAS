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
        if(isset($_REQUEST['inputkode']))
        {
            $kabkode = $_REQUEST['inputkode'];
        }
        
        if(!empty($kabkode))
        {
            $kabkode = $_POST['inputkode'];
        }
        else {
            die ("Anda harus memasukkan kodenya");
        }

        $namakabupaten = $_POST['inputnama'];
        $provinsiID = $_POST["provinsiID"];


        mysqli_query($connection, "insert into Kabupaten values ('$kabkode', '$namakabupaten',
        '$provinsiID')");

        header("location:Kabupaten.php");
    }

    $datakategori = mysqli_query($connection, "select * from kategori");
    $datakecamatan = mysqli_query($connection, "select * from Kabupaten");
    $dataprovinsi = mysqli_query($connection, "select * from provinsi");
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama kecamatan</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>


<div class="row">
	<div class="col-sm-1"></div>

	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
                    <h1 class="display-4"> Input Kabupaten Wisata </h1>
                </div>
            </div> <!--penutup jumbotron-->
  <form method="POST">

  <div class="form-group row">
    <label for="kodearea" class="col-sm-2 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodearea" name="inputkode" placeholder="Kode Kabupaten" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="namakecamtan" class="col-sm-2 col-form-label">Nama Kabupaten</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namakecamatan" name="inputnama" placeholder="Nama Kabupaten">
    </div>
  </div>


    <div class="form-group row">
    <label for="provinsiID" class="col-sm-2 col-form-label">Provinsi</label>
    <div class="col-sm-10">
    <select class="form-control" id="provinsiID" name="provinsiID">

 
    <?php while($row = mysqli_fetch_array($dataprovinsi))
    { ?>

    <option value="<?php echo $row["provinsiID"];?>">
        <?php echo $row["provinsiID"];?>
        <?php echo $row["provinsiNama"];?>
    </option>
        <?php } ?>
    </select>
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
                    <h1 class="display-4"> Daftar Kabupaten Wisata </h1>
                    <h2> Hasil entri data pada Tabel Kabupaten </h2>
                </div>
            </div> <!--penutup jumbotron-->

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama Kabupaten</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
                        placeholder="cari Nama Kabupaten">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
                </div>
            </form>

        <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kabupaten</th>
                    <th>Kode provinsi</th>
                    <th>Nama provinsi</th>
                    <th colspan="2" style="text-align: center">Action</th>
                </tr>

            </thead>

            <tbody>
            <?php 
            if(isset($_POST["kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select Kabupaten.* ,  provinsi.provinsiNama
                from Kabupaten , provinsi
                where areanama like '%".$search."%'
                and Kabupaten.provinsiID = provinsi.provinsiID");
            }else
                {
                    $query = mysqli_query($connection, "select Kabupaten.* ,  provinsi.provinsiNama
                    from Kabupaten , provinsi
                    where Kabupaten.provinsiID = provinsi.provinsiID");
                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td> <?php echo $nomor;?></td>
                        <td> <?php echo $row['kabupatenID'];?></td>
                        <td> <?php echo $row['namakabupaten'];?></td>
                        <td> <?php echo $row['provinsiID'];?></td>
                        <td> <?php echo $row['provinsiNama'];?></td>

                        <!-- icon edit delet-->
                        <td>
                            <a href="kabupatenedit.php?ubah=<?php echo $row["kabupatenID"]?>" 
                            class="btn btn-success btn-sm" title="EDIT">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                         <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                </a>
                </td>

                <td>
                        <a href="kabupatenhapus.php?hapus=<?php echo $row["kabupatenID"]?>" 
                            class="btn btn-danger btn-sm" title="DELETE">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                </a>
                </td>

                        <!-- icon edit delet-->
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
        $('#provinsiarea').select2({
            allowClear: true,
            placeholder: "Pilih Kabupaten Provinsi"

        });
    });
    </script>

</div>
    </div> <!--penutup container-fluid-->

    <?php include "footer.php";?>
    <?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>