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

    if(isset($_POST['simpan']))
    {
        if(isset($_REQUEST['inputkode']))
        {$kategorikode = $_REQUEST['inputkode'];
        }
        
        if(!empty($kategorikode))
        {
            $kategorikode = $_POST['inputkode'];
        }
        else {
            ?> <h1>Anda harus mengiri data</h1> <?php
            die ("Anda harus memasukkan");
        }
        $kategorinama = $_POST['inputnama'];
        $kategoriket = $_POST['inputket'];
        $kategoriref = $_POST['inputref'];

        mysqli_query($connection, "insert into kategori values ('$kategorikode', '$kategorinama',
        '$kategoriket', '$kategoriref')");

        header("location:kategori.php");
    }
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Kategori Wisata</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="row">
<div class="col-sm-1"></div>
  <div class="col-sm 10">
  <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"> Input kategori Wisata </h1>
                </div>
            </div> <!--penutup jumbotron-->
  <form method="POST">

  <div class="form-group row">
    <label for="kodekategori" class="col-sm-2 col-form-label">Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodekategori" name="inputkode" placeholder="Kode Kategori">
    </div>
  </div>

  <div class="form-group row">
    <label for="namakategori" class="col-sm-2 col-form-label">nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namakategori" name="inputnama" placeholder="Nama Kategori">
    </div>
  </div>

  <div class="form-group row">
    <label for="ketkategori" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ketkategori" name="inputket" placeholder="Keterangan Kategori">
    </div>
  </div>

  <div class="form-group row">
    <label for="refkategori" class="col-sm-2 col-form-label">Referensi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="refkategori" name="inputref" placeholder="Referensi kategori">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm 2"></div>
    <div class="col-sm-10">
     <input type="submit" class="btn btn-primary" value="simpan"name="simpan" >
     <input type="button" class="btn btn-secondary" value="batal"name="batal">
    </div>
  </div>
</form>
</div>

<div class="col-sm-1"></div>
</div>


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"> Daftar kategori Wisata </h1>
                    <h2> Hasil entri data pada Tabel Kategori </h2>
                </div>
            </div> <!--penutup jumbotron-->

            <form method="POST">
                <div class="form-group row mb-2">
                    <label for="search" class="col-sm-3">Nama kategori</label>
                    <div class="col-sm-6">
                        <input type="text" name="search" class="form-control" id="search" 
                        value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
                        placeholder="cari Nama Kategori">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
                </div>
            </form>

        <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th> Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Referensi</th>
                </tr>

            </thead>

            <tbody>
            <?php 
            if(isset($_POST["kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select * 
                from kategori
                where kategorinama like '%".$search."%'
                or kategoriketerangan like '%".$search."%'");
            }else
                {
                    $query = mysqli_query($connection, "select * from kategori");
                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td> <?php echo $nomor;?></td>
                        <td> <?php echo $row['KategoriID'];?></td>
                        <td> <?php echo $row['kategorinama'];?></td>
                        <td> <?php echo $row['kategoriketerangan'];?></td>
                        <td> <?php echo $row['kategorireferensi'];?></td>
                    </tr>
                    <?php $nomor = $nomor + 1;?>
               <?php } ?>
            </tbody>
        </table>


        </div>
        <div class="col-sm-1"></div>
    </div>
    <script type="text/javascript" scr="js/bootstrap.min.js"></script>
</body>
</div>
    </div> <!--penutup container-fluid-->

    <?php include "footer.php";?>
    <?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>