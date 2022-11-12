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
	if (isset($_POST['Simpan'])) {
		$kodeberita = $_POST['inputkode'];
		$judulberita = $_POST['inputnama'];
		$beritakategori = $_POST['beritakategori'];
        $tglberita = $_POST['inputTgl'];
        $namapenulis = $_POST['namapenulis'];
        $isiberita = $_POST['isiberita'];

		$nama = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

		//periksa ekstensi file harus jpg

		if (($ekstensifile == "jpg") or ($ekstensifile == "JPG")) {
			move_uploaded_file($file_tmp, 'images/'.$nama); //unggah file ke folder images
			mysqli_query($connection, "insert into berita values ('$kodeberita','$judulberita','$beritakategori',
            '$tglberita', '$namapenulis', '$isiberita','$nama')");
			header("location:berita.php");
		}
	}
    $datakategori = mysqli_query($connection, "select * from kategori");
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
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Input Berita Wisata</h1>
			</div>
		</div>

		<form method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="kodeberita" class="col-sm-2 col-form-label">Kode Berita</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kodeberita" name="inputkode" placeholder="Kode Berita" maxlength="4">
				</div>
			</div>

			<div class="form-group row">
				<label for="judulberita" class="col-sm-2 col-form-label">Judul Berita</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="judulberita" name="inputnama" placeholder="Judul Berita">
				</div>
			</div>

            <div class="form-group row">
        <label for="beritakategori" class="col-sm-2 col-form-label"> Kategori Berita Wisata</label>
        <div class="col-sm-10">
        <select class="form-control" id="beritakategori" name="beritakategori">
   
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
    <label for="tglberita" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tglberita" name="inputTgl" placeholder="dd-mm-yyyy" >
    </div>
  </div>

            <div class="form-group row">
				<label for="namapenulis" class="col-sm-2 col-form-label">Penulis Berita</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="namapenulis" name="namapenulis" placeholder="Nama Penulis">
				</div>
			</div>

            <div class="form-group row">
				<label for="isiberita" class="col-sm-2 col-form-label">Isi Berita</label>
				<div class="col-sm-10">
					<textarea type="textarea" class="form-control" id="isiberita" rows="6" name="isiberita" placeholder="Isi Berita"></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="file" class="col-sm-2 col-form-label">Photo Berita</label>
				<div class="col-sm-10">
					<input type="file" id="file" name="file">
					<p class="help-block">Field ini digunakan untuk unggah file</p>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
					<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
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
					<h1 class="display-4">Daftar Berita Wisata</h1>
				</div>
			</div>
		

		<table class="table table-hover table-danger">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Kode Berita</th>
					<th>Judul Berita</th>
					<th>Kategoti Berita</th>
					<th>Tanggal Berita</th>
                    <th>Penulis Berita</th>
                    <th>Isi Berita</th>
                    <th>Photo Berita</th>
					<th colspan="2" style="text-align: center;">Action</th>
				</tr>
			</thead>

			<tbody>
				<?php $query = mysqli_query($connection, "select * from berita");
				$nomor = 1;
				while ($row = mysqli_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $row['beritaID']; ?></td>
						<td><?php echo $row['judulberita']; ?></td>
						<td><?php echo $row['kategoriberita']; ?></td>
                        <td><?php echo $row['tglberita']; ?></td>
                        <td><?php echo $row['penulisberita']; ?></td>
                        <td><?php echo $row['isiberita']; ?></td>
						<td>
							<?php if (is_file("images/".$row['fotoberita'])) { ?>
								<img src="images/<?php echo $row['fotoberita'] ?>" width="80">
							<?php } 
								else echo "<img src='images/weh.jpg' width='80'>";
							?>
						</td>

						<td>
							<a href="fotodestinasiubah.php?ubahfoto=<?php echo $row['beritaID']?>" class="btn btn-success btn-sm" title="EDIT">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
							</a>
						</td>

						<td>
							<a href="fotodestinasihapus.php?hapusfoto=<?php echo $row['beritaID']?>" class="btn btn-danger btn-sm" title="DELETE">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
							</a>
						</td>
					</tr>

					<?php $nomor = $nomor + 1; ?> 
				<?php } ?>
			</tbody>
		</table>
		</div>
		
		<div class="col-sm-1"></div>

	</div>

</body>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</div>
    </div> <!--penutup container-fluid-->

    <?php include "footer.php";?>
    <?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>