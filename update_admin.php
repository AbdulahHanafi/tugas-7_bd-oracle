<?php 
include "koneksi.php";

$ID_USER = $_POST['ID_USER'];
$USERNAME = $_POST['USERNAME'];
$PASWORD  = $_POST['PASWORD'];
$TELP  = $_POST['TELP'];


$sql = "UPDATE admin SET USERNAME='$USERNAME', PASWORD='$PASWORD', TELP='$TELP' WHERE ID_USER='$ID_USER'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
		header('location: admin.php?pesan=update');
	}
	else {echo "gagal";}
 ?>