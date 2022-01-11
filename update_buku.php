<?php 
include "koneksi.php";

$KODE_BUKU = $_POST['KODE_BUKU'];
$JUDUL_BUKU = $_POST['JUDUL_BUKU'];
$PENGARANG  = $_POST['PENGARANG'];
$PENERBIT  = $_POST['PENERBIT'];


$sql = "UPDATE buku SET JUDUL_BUKU='$JUDUL_BUKU', PENGARANG='$PENGARANG', PENERBIT='$PENERBIT' WHERE KODE_BUKU='$KODE_BUKU'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
		header('location: buku.php?pesan=update');
	}
	else {echo "gagal";}
 ?>