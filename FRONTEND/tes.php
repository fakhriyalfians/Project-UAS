<!doctype html>
<?php include "atas.php";?>

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
            
            <h1> Jelajahi Wisata Indonesia </h1>
            <p>Bersama Kami</p>
            
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
                                <a href="berita.php?opsi=<?php echo $row5['beritaID']?>">Continue Reading</a>
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
          <a href="paging.php"> Discover More</a>
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
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <?php include "bawah.php";?>
</html>