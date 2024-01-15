<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kelola Hutang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require 'sidebar.php'; 

$pendapatan = mysqli_query($koneksi, "SELECT id_pemasukan FROM pemasukan");
$pendapatan = mysqli_num_rows($pendapatan);

$pengeluaran = mysqli_query($koneksi, "SELECT id_pengeluaran FROM pengeluaran");
$pengeluaran = mysqli_num_rows($pengeluaran);

?>

      <!-- Main Content -->
      <div id="content">
	  
<?php require 'navbar.php'; ?>
  
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Hutang</h1>
          <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Catat Hutang</i></button><br>
          <!-- Content Row -->
          <div class="row">
          </div>
		  
		            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Hutang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					            <th>No.urut</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Alasan</th>
                      <th>Hutang Ke</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
$no = 1;
$jumlahhutang = 0;
while ($data = mysqli_fetch_assoc($query)) 
{
  $jumlah = $data['jumlah'];
  $jumlahhutang = $jumlahhutang + $jumlah;
?>
                    <tr>
					<td><?=$no++?></td>
                      <td><?=$data['jumlah']?></td>
                      <td><?=$data['tgl_hutang']?></td>
                      <td><?=$data['alasan']?></td>
                      <td><?=$data['hutangin']?></td>
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_hutang']; ?>"></a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_hutang']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Hutang</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses.php" method="get">

<?php
$id = $data['id_hutang']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM hutang WHERE id_hutang='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_hutang" value="<?php echo $row['id_hutang']; ?>">

<div class="form-group">
<label>Jumlah</label>
<input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tgl_hutang" class="form-control" value="<?php echo $row['tgl_hutang']; ?>">      
</div>

<div class="form-group">
<label>Alasan</label>
<input type="text" name="alasan" class="form-control" value="<?php echo $row['alasan']; ?>">      
</div>

<div class="form-group">
<label>Hutang Ke</label>
<input type="text" name="hutangin" class="form-control" value="<?php echo $row['hutangin']; ?>">      
</div>

<div class="modal-footer">  
<button type="submit" name="hutang_update" class="btn btn-success">Ubah</button>
<a href="proses.php?hutang_del=<?=$row['id_hutang'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



<!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Hutang</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="proses.php" method="get">
        <div class="modal-body">
		Jumlah 
         <input type="text" class="form-control" name="jumlah">
		Tanggal 
         <input type="date" class="form-control" name="tgl_hutang">
		Alasan 
         <input type="text" class="form-control" name="alasan">
		Hutang Ke 
         <input type="text" class="form-control" name="hutangin">
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
		<button type="submit" name="hutang_add" class="btn btn-success" >Tambah</button>
		</form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>
  </div>


<?php               
} 
?>
                  </tbody>
                  <tfoot>
                    <tr>
					            <th>TOTAL</th>
                      <th><?= 'Rp. ' . number_format($jumlahhutang, 0, ',', '.'); ?></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

</body>

</html>
