<!doctype html>
<?php include "atas.php";?>
<?php 
$cek = $_GET["opsi"];
$berita1 = mysqli_query($connection, "select * from berita
where beritaID = '$cek'");
$row8 = mysqli_fetch_array($berita1);
$isiberita = mysqli_query($connection, "select * from beritafull Where beritaID = '$cek'");
$row9 = mysqli_fetch_array($isiberita);
?>
<section class="our-blog">
    <div class="row">
    <div class="col-sm-8">
      <div class="news padding-60">
        <div class="container">
        <div class="heading">
        <div class="col-md-12 ">
                        <h2><?php echo $row8["judulberita"]?></h2>
                    </div>
            <div class="row justify-content-center">
            <img src="images/<?php echo $row8["fotoberita"];?>" class="img-fluid" alt="Responsive image">

                </div>
                <span style="margin-left: 230px ;"><?php echo $row8["penulisberita"]?> / Admin</span>
            </div>
            <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                <div class="col-lg-8" style="margin-top: 50px;">
                <article><?php echo $row9["paragraf1"];?></article>
            <br>

                <article><?php echo $row9["paragraf2"];?></article>

                </div>
                </div>
                </div>  
            </div>
  
    </div>
    </div>
    </div>
    <div class="col-sm-4 video">
<div class="other_area ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="heading text-center">
          <h1>Panorama Video</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="video_area padding-6">
  <div class="container">
    <div class=" section_padding_6">
      <h6> </h6>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/hjKO0d_umLc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class=" section_padding_6">
      <h6> </h6>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/K1QICrgxTjA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>
    </div>
    </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <?php include "bawah.php";?>
</html>