<!doctype html>


<?php
include "includes/config.php";
$query = mysqli_query($connection, "select * from area");
$query1 = mysqli_query($connection, "select * from provinsi");
$query2 = mysqli_query($connection, "select * from kategori");
$query3 = mysqli_query($connection, "select * from kategori");
$query11 = mysqli_query($connection, "select * from event");

$destinasi = mysqli_query($connection, "select * 
from kategori, destinasi, fotodestinasi
where kategori.kategoriID = destinasi.kategoriID
AND destinasi.destinasiID = fotodestinasi.destinasiID");

 $sql = mysqli_query($connection, "select * from destinasi");
 $jumlah = mysqli_num_rows($sql);

 $foto = mysqli_query($connection, "select * from fotodestinasi");
 $hotel = mysqli_query($connection, "select hotel.* , area.areanama, area.areawilayah,
 provinsi.provinsinama
  from hotel , area , provinsi
  where hotel.areaID = area.areaID
  and hotel.provinsiID = provinsi.provinsiID 
  and hargahotel < 800000");
 $restoran = mysqli_query($connection, "select restoran.* , area.areanama,
 provinsi.provinsinama
  from restoran , area , provinsi
  where restoran.areaID = area.areaID
  and restoran.provinsiID = provinsi.provinsiID");
 $berita = mysqli_query($connection, "select * from berita");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ss.css">

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white shadow">
  <div class="container d-flex justify-content-between align-items-center">
  <a class="navbar-brand h1" href="tes.php">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class="text-dark h5">Param</span> <span class="text-primary h5">Travel</span>
            </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbarSupportedContent">
  <div class="flex-fill mx-xl-5 mb-2">
  <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
      <li class="nav-item active">
        <a class="nav-link btn-outline-primary rounded-pill px-3" href="tes.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link btn-outline-primary rounded-pill px-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(mysqli_num_rows($query3)>0);
            { 
                while ($row8 =  mysqli_fetch_array($query3))
                { ?> 
                    <a class="dropdown-item" href="#"><?php echo $row8["KategoriID"];?> <?php echo $row8["kategorinama"];?></a>
             <?php } } ?>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link btn-outline-primary rounded-pill px-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Kabupaten
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if(mysqli_num_rows($query)>0);
            { 
                while ($row =  mysqli_fetch_array($query))
                { ?> 
                    <a class="dropdown-item" href="#"><?php echo $row["areawilayah"];?></a>
             <?php } } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link btn-outline-primary rounded-pill px-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Provinsi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(mysqli_num_rows($query1)>0);
            { 
                while ($row6 =  mysqli_fetch_array($query1))
                { ?> 
                    <a class="dropdown-item" href="#"><?php echo $row6["provinsiNama"];?></a>
             <?php } } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link btn-outline-primary rounded-pill px-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          News
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(mysqli_num_rows($query2)>0);
            { 
                while ($row7 =  mysqli_fetch_array($query2))
                { ?> 
                    <a class="dropdown-item" href="#">Wisata <?php echo $row7["kategorinama"];?></a>
             <?php } } ?>
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link btn-outline-primary rounded-pill px-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Event
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Event.php">Calendar Event</a>
        </div>
      </li>
      
      </li>
      <li class="nav-item">
        <a class="nav-link btn-outline-primary rounded-pill px-3" href="#">Tour Guide</a>
      </li>
    </ul>
  </div>
  </div>
</nav>



    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>