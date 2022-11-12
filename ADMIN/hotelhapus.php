<?php
	include "includes/config.php";
	if (isset($_GET['hapus'])) {
		$hotelkode = $_GET['hapus'];
		$hapushotel = mysqli_query($connection, "select * from hotel
			where hotelID = '$hotelkode' ");
		$hapus = mysqli_fetch_array($hapushotel);
		$namafile = $hapus['fotohotel'];

		mysqli_query($connection, "delete from hotel where
			hotelID = '$hotelkode' ");
		unlink('images/'.$namafile);

		echo "<script>alert('DATA BERHASIL DIHAPUS');
		document.location='hotel.php'</script>";
	}
?>