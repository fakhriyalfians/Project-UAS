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

    if(isset($_POST['Edit']))
    {
        if(isset($_REQUEST['inputkode']))
        {
            $destinasikode = $_REQUEST['inputkode'];
        }
        
        if(!empty($destinasikode))
        {
            $destinasikode = $_POST['inputkode'];
        }
        else {
            die ("Anda harus memasukkan kodenya");
        }

        $destinasinama = $_POST['inputnama'];
        $alamat = $_POST['alamat'];
        $kodekategori = $_POST['kodekategori'];
        $kodearea = $_POST["kodearea"];
        $provinsiarea = $_POST["provinsiarea"];


     /*   mysqli_query($connection, "insert into destinasi values ('$destinasikode', '$destinasinama',
        '$alamat', '$kodekategori', '$kodearea', '$provinsiarea')");
        header("location:destinasi.php");
*/
    mysqli_query($connection,"update destinasi set destinasinama='$destinasinama',
    destinasialamat='$alamat', kategoriID='$kodekategori',areaID='$kodearea'
    where destinasiID = '$destinasikode'");
    header("location:destinasi.php");

    }

    $datakategori = mysqli_query($connection, "select * from kategori");
    $dataarea = mysqli_query($connection, "select * from area");
    $dataprovinsi = mysqli_query($connection, "select * from provinsi");

    // untuk menampilkan data form edit
    $kodedestinasi = $_GET["ubah"];
    $editdestinasi = mysqli_query($connection, "select * from destinasi 
    where destinasiID = '$kodedestinasi'");
    $rowedit = mysqli_fetch_array($editdestinasi);

    $editkategori = mysqli_query($connection, "select * from destinasi, kategori
    where destinasiID = '$kodedestinasi' and destinasi.kategoriID = kategori.kategoriID ");
    $rowedit2 = mysqli_fetch_array($editkategori);

    $editarea = mysqli_query($connection, "select * from destinasi, area
    where destinasiID = '$kodedestinasi' and destinasi.areaID = area.areaID ");
    $rowedit3 = mysqli_fetch_array($editarea);


    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
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
                    <h1 class="display-4"> Input Destinasi Wisata </h1>
                </div>
            </div> <!--penutup jumbotron-->
  <form method="POST">

  <div class="form-group row">
    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodedestinasi" name="inputkode" 
      value="<?php echo $rowedit["destinasiID"]?>" >
    </div>
  </div>

  <div class="form-group row">
    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namadestinasi" name="inputnama" 
      value="<?php echo $rowedit["destinasinama"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat Destinasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alamat" name="alamat" 
      value="<?php echo $rowedit["destinasialamat"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="refkategori" class="col-sm-2 col-form-label"> Kategori Wisata</label>
    <div class="col-sm-10">
    <select class="form-control" id="kodekategori" name="kodekategori">
    <option value="<?php echo $rowedit["kategoriID"]?>">
    <?php echo $rowedit['kategoriID']?>
    <?php echo $rowedit2['destinasinama']?>
    </option>
    <?php while($row = mysqli_fetch_array($datakategori))
    { ?>
    <option value="<?php echo $row["KategoriID"];?>">
        <?php echo $row["KategoriID"];?>
        <?php echo $row["kategorinama"];?>
    </option>
        <?php } ?>

    </select>
  </div>
    </div>

  <div class="form-group row">
    <label for="refkategori" class="col-sm-2 col-form-label">Area Wisata</label>
    <div class="col-sm-10">
    <select class="form-control" id="kodearea" name="kodearea">
    <option value="<?php echo $rowedit["areaID"]?>">
    <?php echo $rowedit['areaID']?>
    <?php echo $rowedit3['areanama']?></option>
    <?php while($row = mysqli_fetch_array($dataarea))
    { ?>

    <option value="<?php echo $row["areaID"];?>">
        <?php echo $row["areaID"];?>
        <?php echo $row["areanama"];?>
    </option>
        <?php } ?>
    </select>
  </div>
    </div>

    <div class="form-group row">
    <label for="provonsi" class="col-sm-2 col-form-label">Provinsi</label>
    <div class="col-sm-10">
    <select class="form-control" id="provinsiarea" name="provinsiarea">

 
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
     <input type="submit" class="btn btn-primary" value="Edit"name="Edit" >
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
                    <h1 class="display-4"> Daftar destinasi Wisata </h1>
                    <h2> Hasil entri data pada Tabel Destinasi </h2>
                </div>
            </div> <!--penutup jumbotron-->

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama Destinasi</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
                        placeholder="cari Nama Destinasi">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
                </div>
            </form>

        <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Destinasi</th>
                    <th>Alamat</th>
                    <th>Kode kategori</th>
                    <th>Nama kategori</th>
                    <th>Kode Area</th>
                    <th>Nama Area</th>
                    <th>Nama Provinsi</th>
                    <th colspan="2" style="text-align: center">Action</th>
                </tr>

            </thead>

            <tbody>
            <?php 
            if(isset($_POST["kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select destinasi.* , kategori.kategoriID, 
                kategori.kategorinama, area.areaID, area.areanama, provinsi.provinsiID
                from destinasi, kategori, area , provinsi
                where destinasinama like '%".$search."%'
                and destinasi.kategoriID = kategori.kategoriID 
                and destinasi.areaID = area.areaID");
            }else
                {
                    $query = mysqli_query($connection, "select destinasi.* , kategori.kategoriID, 
                    kategori.kategorinama, area.areaID, area.areanama, provinsi.provinsiID
                    from destinasi, kategori, area , provinsi
                    where destinasi.kategoriID = kategori.kategoriID 
                    and destinasi.areaID = area.areaID
                    and destinasi.provinsiID = provinsi.provinsiID");
                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td> <?php echo $nomor;?></td>
                        <td> <?php echo $row['destinasiID'];?></td>
                        <td> <?php echo $row['destinasinama'];?></td>
                        <td> <?php echo $row['destinasialamat'];?></td>
                        <td> <?php echo $row['kategoriID'];?></td>
                        <td> <?php echo $row['kategorinama'];?></td>
                        <td> <?php echo $row['areaID'];?></td>
                        <td> <?php echo $row['areanama'];?></td>
                        <td> <?php echo $row['provinsiID'];?></td>

                        <!-- icon edit delet-->
                        <td>
                            <a href="destinasiedit.php?ubah=<?php echo $row["destinasiID"]?>" 
                            class="btn btn-success btn-sm" title="EDIT">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                         <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                </a>
                </td>

                        <td>
                        <a href="destinasihapus.php?hapus=<?php echo $row["destinasiID"]?>" 
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