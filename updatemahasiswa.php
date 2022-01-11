<?php 
include "koneksi.php";

$ID_MHS = $_POST['ID_MHS'];
$NAMA = $_POST['NAMA'];
$NIM  = $_POST['NIM'];
$TMT_LHR  = $_POST['TMT_LHR'];
$TGL_LHR  = $_POST['TGL_LHR'];
$GENDER  = $_POST['GENDER'];
$ALAMAT  = $_POST['ALAMAT'];
$EMAIL  = $_POST['EMAIL'];


$sql = "UPDATE mahasiswa SET NAMA='$NAMA', NIM='$NIM', TMT_LHR='$TMT_LHR', TGL_LHR='$TGL_LHR', GENDER='$GENDER', ALAMAT='$ALAMAT', EMAIL='$EMAIL' WHERE ID_MHS='$ID_MHS'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
		header('location: mahasiswa.php?pesan=update');
	}
	else {echo "gagal";}
 ?>