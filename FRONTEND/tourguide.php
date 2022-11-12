<!doctype html>
<?php include "atas.php";?>
<div class="col-sm-1"></div>
	</div>

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Daftar Tour Guide</h1>
				</div>
			</div>
		

		<table class="table table-hover table-danger">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Guide ID</th>
					<th>Nama Guide</th>
					<th>Bahasa</th>
                    <th>NO Telp Guide</th>
                    <th>Nama Area</th>
                    <th>Nama Provinsi</th>
                    <th>Foto Guider</th>
                    
					
				</tr>
			</thead>

			<tbody>
				<?php $query = mysqli_query($connection, "select tourguide.* , area.areanama,
                provinsi.provinsinama
                 from tourguide , area , provinsi
                 where tourguide.areaID = area.areaID
                 and tourguide.provinsiID = provinsi.provinsiID");
				$nomor = 1;
				while ($row = mysqli_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $row['guideID']; ?></td>
						<td><?php echo $row['guidenama']; ?></td>
						<td><?php echo $row['guidebahasa']; ?></td>
                        <td><?php echo $row['noguide']; ?></td>
                        <td><?php echo $row['areanama']; ?></td>
                        <td><?php echo $row['provinsinama']; ?></td>
						<td>
							<?php if (is_file("images/".$row['fotoguide'])) { ?>
								<img src="images/<?php echo $row['fotoguide'] ?>" width="80">
							<?php } 
								else echo "<img src='images/weh.jpg' width='80'>";
							?>
						</td>

						
					</tr>

					<?php $nomor = $nomor + 1; ?> 
				<?php } ?>
			</tbody>
		</table>
		</div>
		
		<div class="col-sm-1"></div>

	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <?php include "bawah.php";?>
</html>