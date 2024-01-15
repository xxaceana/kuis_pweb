<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Hutang.xls");
	?>
		<h3>Data Hutang</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>ID Hutang</th>
	<th>Jumlah</th>  
    <th>Tanggal</th>
    <th>Alasan</th>    
	<th>Hutang Ke</th> 
	</tr>  
	<?php     
    // Load file koneksi.php  
	include "koneksi.php"; 
	// Buat query untuk menampilkan semua data siswa 
    $query = mysqli_query($koneksi, "SELECT * FROM hutang");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_hutang']."</td>";   
	echo "<td>".$data['jumlah']."</td>";    
	echo "<td>".$data['tgl_hutang']."</td>";    
	echo "<td>".$data['alasan']."</td>";   
	echo "<td>".$data['hutangin']."</td>";    
	echo "</tr>";        
	}  ?></table>