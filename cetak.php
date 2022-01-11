<!DOCTYPE html>
<?php
include 'koneksi.php';
include'fungsi/fungsi_rupiah.php';
include'fungsi/fungsi_indotgl.php';

?>
<html>
<?php include'header.php' ?>
<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Penjualan Beras</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Nama Mahasiswa </th>
						<th>Judul Buku </th>
						<th>Tanggal Pinjam</th>                      										
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi, 'SELECT mahasiswa.*, buku.*, dipinjam.* FROM dipinjam 
dipinjam INNER JOIN mahasiswa mahasiswa ON dipinjam.ID_MHS = mahasiswa.ID_MHS 
INNER JOIN buku buku ON dipinjam.KODE_BUKU = buku.KODE_BUKU ORDER BY dipinjam.ID_PINJAM ASC');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
                          <td>
						 <?php echo $row["NAMA"];?>
						</td>
						<td>
						 <?php echo $row["JUDUL_BUKU"];?>
						</td>
						<td>
						 <?php echo tgl_indo($row["TGL_PINJAM"]);?>
						</td>
						
                                             
                      </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
          </div>
 <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Bekasi, <?php echo tgl_indo($hari_ini); ?></center>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Abdulah Hanafi</center></b>
                </div>
              </div>
            </div>
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>