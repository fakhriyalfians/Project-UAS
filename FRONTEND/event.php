<!doctype html>
<?php include "atas.php";?>
<?php 

$event = mysqli_query($connection, "select event.* , kabupaten.namakabupaten
 from event , kabupaten
 Where
 event.kabupatenID=kabupaten.kabupatenID");
?>
<div class="col-sm-1"></div>
	</div>

    <section class="our-blog">
    <div class="row">
    <div class="col-sm-8">
      <div class="news padding-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="heading">
                        <h2 style="font-family: Cursive;">Calendar Of Events</h2>
                    </div>
                </div>
            </div>
            <?php if(mysqli_num_rows($event)>0) {
          while ($row8 = mysqli_fetch_array($event))
          { ?>
                <div class="col-md-12">
                    <div class="blog-post">
                        
                    <div class="event-blog d-flex mb-50">
        <figure class="figure">
  <img src="images/<?php echo $row8["eventposter"]?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure." style="width: 1200px; margin-right
  :15px">
  <figcaption class="figure-caption" style="font-size: 18px; font-style: italic">Source Event: <?php echo $row8['eventsumber']?></figcaption>
</figure>

        <div class="post-content " style="margin-left: 50px;">
        <P style="border-bottom: 3px solid blue; font-weight: bold; font-family:Monospace; font-size: 20px"><?php echo $row8["namakabupaten"]?></p>
        <div class="post-title">
        <h4 style="font-weight: bold; font-family: Cursive;"><?php echo $row8["eventnama"]?></h4>
        </div>
        <div class="post-event">
            <div class="text-paragraf">
            <p  style="text-align: justify; font-family: Cursive;"><?php echo $row8["eventket"]?>
        </p>
            </div>
        </div>
        <div class="post-mulai">
        <div class="eventmulai" style="border-bottom: 3px solid red; font-weight: bold; font-family:Monospace; font-size: 20px">Event On <?php echo $row8["eventmulai"]?> s/d <?php echo $row8["eventselesai"]?></div>
        </div>
        </div>
    </div>
                    </div>
                </div>
                <?php } } ?>
    </div>
    </div>
    <?php if(mysqli_num_rows($event)>0) {
          while ($row8 = mysqli_fetch_array($event))
          { ?>


    <?php } } ?>
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
      <iframe width="560" height="315" src="https://www.youtube.com/embed/dL1oX88H4_Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class=" section_padding_6">
      <h6> </h6>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/6-_0Q4IVZrc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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