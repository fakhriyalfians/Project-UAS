<!doctype html>


<?php
include "includes/config.php";
$query = mysqli_query($connection, "select * from area");
$query1 = mysqli_query($connection, "select * from provinsi");
$query2 = mysqli_query($connection, "select * from kategori");
$query3 = mysqli_query($connection, "select * from kategori");

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
  and hotel.provinsiID = provinsi.provinsiID");
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
    <link rel="stylesheet" type="text/css" href="s.css">

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white shadow">
  <div class="container d-flex justify-content-between align-items-center">
  <a class="navbar-brand h1" href="index.html">
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
        <a class="nav-link btn-outline-primary rounded-pill px-3" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link btn-outline-primary rounded-pill px-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          News
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
      </li>
      <li class="nav-item">
        <a class="nav-link btn-outline-primary rounded-pill px-3" href="#">Tour Guide</a>
      </li>
    </ul>
  </div>
  </div>
</nav>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/sc.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
            
            <h1> 11111111111111111 </h1>
            <p>qwe</p>
            
        </div> 
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/sc.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/sc.jpg" alt="Third slide">
      
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <section class="our-blog">
    <div class="row">
    <div class="col-sm-8">
      <div class="news padding-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <?php if(mysqli_num_rows($berita)>0) {
          while ($row5 = mysqli_fetch_array($berita))
          { ?>
                <div class="col-md-12">
                    <div class="blog-post">
                        <img src="images/<?php echo $row5["fotoberita"]?>" alt="">
                        <div class="right-content">
                            <h4><?php echo $row5["judulberita"]?></h4>
                            <span><?php echo $row5["kategoriberita"]?> /</span>
                            <span><?php echo $row5["penulisberita"]?> / Admin</span>
                            <div class="date"><?php echo $row5["tglberita"]?></div>
                            <p><?php echo $row5["isiberita"]?>...</p>
                            <div class="text-button">
                                <a href="#">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
  
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


    <div class="banner">
                <div class="captiont-bg">
                    <h2>Life is <em>short</em>, the world is<em> wide</em>!</h2>
                    <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                    <div class="btn btn-outline-info">
                        <a href="#">Travel Now</a>
                    </div>
                </div>
            </div>

    <div class="destination">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="heading text-center">
              <h2>Destination Galery</h2>
              <div class="batas">
              <img src="images/head.png">
              </div>
              <h4>Kumpulan foto destinasi yang menarik untuk dikunjungi</h4>
              <h4>x destinasi</h4>
            </div>
          </div>
        </div>
        <div class="row">
            <?php if(mysqli_num_rows($destinasi)>0) {
    while ($row2 = mysqli_fetch_array($destinasi))
{ ?>
        
          <div class="col-lg-4 col-md-6">
            <div class="singe_destination">
            <figure class="figure">
          
         <img src="images/<?php echo $row2["fotofile"]?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
        <figcaption class="figure-caption text-right"><?php echo $row2["destinasinama"]?>  <?php echo $row2["destinasialamat"]?></figcaption>
        </figure> 
            </div>
  
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
    
     <!-- Start Featured Product -->
     <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">HOTEL</h1>
                    <div class="batas">
              <img src="images/head.png">
              </div>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            
            <div class="row">
            <?php if(mysqli_num_rows($hotel)>0) {
        while ($row3 = mysqli_fetch_array($hotel))
      { ?>
                <div class="col-12 col-md-4 mb-4">
               
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="images/<?php echo $row3["fotohotel"]?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
</svg>
                                </li>
                                <li class="text-muted text-right">Rp.<?php echo $row3["hargahotel"]?>/Malam</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark"><?php echo $row3["hotelnama"]?></a>
                            <p class="card-text">
                            <?php echo $row3["areanama"]?>, <?php echo $row3["areawilayah"]?>, <?php echo $row3["provinsinama"]?>.
                            </p>
                            <p class="text-muted"><?php echo $row3["fasilitas"]?></p>
                        </div>
                    
                    </div>
                    
                </div>
                <?php } } ?>
              
            </div>
            <div class="paging btn btn-outline-info btn-lg btn-block">
          <a href="#"> Discover More</a>
        </div>
        </div>
    </section>
    <!-- End Featured Product -->

       <section class="our-blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="heading text-center" >
                        <h2>RESTAURANT</h2>
                        <div class="batas ">
                      <img src="images/head.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php if(mysqli_num_rows($restoran)>0) {
    while ($row4 = mysqli_fetch_array($restoran))
  { ?>
                <div class="col-md-6">
                    <div class="blog-post">
                        <img src="images/<?php echo $row4["fotoresto"]?>" alt="">
                        <div class="right-content">
                            <h4><?php echo $row4["restonama"]?></h4>
                            <span><?php echo $row4["areanama"]?> / <?php echo $row4["provinsinama"]?></span>
                            <p><?php echo $row4["deskripsi"]?></p>
                            
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    
        <!-- Start Footer -->
        <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="index.html">
                        <i class='bx bx-buildings bx-sm text-light'></i>
                        <span class="text-light h5">Purple</span> <span class="text-light h5 semi-bold-600">Buzz</span>
                    </a>
                    <p class="text-light my-lg-4 my-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut.
                    </p>
                    <ul class="list-inline footer-icons light-300">
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="http://facebook.com/">
                                <i class='bx bxl-facebook-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.linkedin.com/">
                                <i class='bx bxl-linkedin-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.whatsapp.com/">
                                <i class='bx bxl-whatsapp-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.flickr.com/">
                                <i class='bx bxl-flickr-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.medium.com/">
                                <i class='bx bxl-medium-square bx-md' ></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h3 class="h4 pb-lg-3 text-light light-300">Our Company</h2>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <a class="text-decoration-none text-light" href="index.html">Home</a>
                            </li>
                            <li class="pb-2">
                                <a class="text-decoration-none text-light py-1" href="about.html">About Us</a>
                            </li>
                            <li class="pb-2">
                                <a class="text-decoration-none text-light py-1" href="work.html">Work</a>
                            </li>
                            <li class="pb-2">
                               <a class="text-decoration-none text-light py-1" href="pricing.html">Price</a>
                            </li>
                            <li class="pb-2">
                                <a class="text-decoration-none text-light py-1" href="contact.html">Contact</a>
                            </li>
                        </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">Our Works</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="#">Branding</a>
                        </li>
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="#">Business</a>
                        </li>
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="#">Marketing</a>
                        </li>
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="#">Social Media</a>
                        </li>
                        <li class="pb-2">
                           <a class="text-decoration-none text-light py-1" href="#">Digital Solution</a>
                        </li>
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="#">Graphic</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">For Client</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li class="pb-2">
                            <a class="text-decoration-none text-light py-1" href="mailto:info@company.com">info@company.com</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-primary py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-sm-12">
                        <p class="text-lg-start text-center text-light light-300">
                            © Copyright 2021 Purple Buzz Company. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>