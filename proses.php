<?php
include 'koneksi.php';

// PROSES TAMBAH/EDIT/HAPUS PEMASUKAN
if (isset($_GET['pemasukan_add'])) {
    $id_pemasukan  = $_GET['id_pemasukan'];
    $tgl_pemasukan = $_GET['tgl_pemasukan'];
    $jumlah        = $_GET['jumlah'];
    $sumber        = $_GET['sumber'];

    $query = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`id_pemasukan`,`tgl_pemasukan`, `jumlah`, `sumber`) 
    VALUES ('$id_pemasukan','$tgl_pemasukan', '$jumlah', '$sumber')");

    if ($query) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Ditambahkan'); 
        window.location.href='pendapatan.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Ditambahkan');
    window.location.href='pendapatan.php'</script>";}

}

if (isset($_GET['pemasukan_update'])) {
    $id = $_GET['id_pemasukan'];
    $tgl = $_GET['tgl_pemasukan'];
    $jumlah = $_GET['jumlah'];
    $sumber = $_GET['sumber'];

    $query = "UPDATE pemasukan SET id_pemasukan = '$id' , tgl_pemasukan='$tgl' , jumlah='$jumlah', sumber='$sumber' 
    WHERE id_pemasukan=$id";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Diupdate'); 
        window.location.href='pendapatan.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Diupdate');
    window.location.href='pendapatan.php'</script>";}
    }

if (isset($_GET['pemasukan_del'])) {
    $idp = $_GET['pemasukan_del'];

    $hapus = "DELETE FROM `pemasukan` WHERE id_pemasukan='$idp'";

    if (mysqli_query($koneksi, $hapus)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Di Hapus'); 
    window.location.href='pendapatan.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Di Hapus');
    window.location.href='pendapatan.php'</script>";
    }
}
// ========================================================================================================

// PROSES TAMBAH/EDIT/HAPUS PENGELUARAN
if (isset($_GET['pengeluaran_add'])) {
    $id_pengeluaran  = $_GET['id_pengeluaran'];
    $tgl_pengeluaran = $_GET['tgl_pengeluaran'];
    $jumlah = $_GET['jumlah'];
    $sumber = $_GET['sumber'];

    $query = mysqli_query($koneksi,"INSERT INTO `pengeluaran` (`id_pengeluaran`,`tgl_pengeluaran`, `jumlah`, `sumber`) 
    VALUES ('$id_pengeluaran','$tgl_pengeluaran', '$jumlah', '$sumber')");

    if ($query) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Ditambahkan'); 
        window.location.href='pengeluaran.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Ditambahkan');
    window.location.href='pengeluaran.php'</script>";}

}

if (isset($_GET['pengeluaran_update'])) {
    $id = $_GET['id_pengeluaran'];
    $tgl = $_GET['tgl_pengeluaran'];
    $jumlah = $_GET['jumlah'];
    $sumber = $_GET['sumber'];

    $query = "UPDATE pengeluaran SET id_pengeluaran = '$id' , tgl_pengeluaran='$tgl' , jumlah='$jumlah', sumber='$sumber' 
    WHERE id_pengeluaran=$id";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Diupdate'); 
        window.location.href='pengeluaran.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Diupdate');
    window.location.href='pengeluaran.php'</script>";}
    }

if (isset($_GET['pengeluaran_del'])) {
    $idp = $_GET['pengeluaran_del'];

    $hapus = "DELETE FROM `pengeluaran` WHERE id_pengeluaran='$idp'";

    if (mysqli_query($koneksi, $hapus)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Di Hapus'); 
    window.location.href='pengeluaran.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Di Hapus');
    window.location.href='pengeluaran.php'</script>";
    }
}
// ========================================================================================================

// PROSES TAMBAH/EDIT/HAPUS HUTANG
if (isset($_GET['hutang_add'])) {
    $id_hutang  = $_GET['id_hutang'];
    $jumlah = $_GET['jumlah'];
    $tgl_hutang = $_GET['tgl_hutang'];
    $alasan = $_GET['alasan'];
    $hutangin = $_GET['hutangin'];

    $query = mysqli_query($koneksi,"INSERT INTO `hutang` (`id_hutang`,`jumlah`, `tgl_hutang`, `alasan`, `hutangin`) 
    VALUES ('$id_hutang', '$jumlah', '$tgl_hutang', '$alasan', '$hutangin')");

    if ($query) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Ditambahkan'); 
        window.location.href='hutang.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Ditambahkan');
    window.location.href='hutang.php'</script>";}

}

if (isset($_GET['hutang_update'])) {
    $id = $_GET['id_hutang'];
    $jumlah = $_GET['jumlah'];
    $tgl = $_GET['tgl_hutang'];
    $alasan = $_GET['alasan'];
    $hutangin = $_GET['hutangin'];

    $query = "UPDATE hutang SET id_hutang = '$id', jumlah='$jumlah' , tgl_hutang='$tgl', alasan='$alasan', hutangin='$hutangin' 
    WHERE id_hutang='$id' ";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Diupdate'); 
        window.location.href='hutang.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Diupdate');
    window.location.href='hutang.php'</script>";}
}

if (isset($_GET['hutang_del'])) {
    $idp = $_GET['hutang_del'];

    $hapus = "DELETE FROM `hutang` WHERE id_hutang='$idp'";

    if (mysqli_query($koneksi, $hapus)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Di Hapus'); 
    window.location.href='hutang.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Di Hapus');
    window.location.href='hutang.php'</script>";
    }
}
// ========================================================================================================

// PROSES TAMBAH/EDIT ADMIN
if (isset($_GET['admin_add'])) {
    $id  = $_GET['id_admin'];
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $pass = $_GET['pass'];

$query = mysqli_query($koneksi,"INSERT INTO `admin` (`id_admin`,`nama`, `email`, `pass`) VALUES ('$id','$nama', '$email', '$pass')");

if ($query) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location.href='profile.php'</script>";
} else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Gagal Ditambahkan');
window.location.href='profile.php'</script>";}
}

if (isset($_GET['admin_update'])) {
    $id = $_GET['id_admin'];
    $nama = $_GET['nama'];
    $email = $_GET['email'];
    $pass = $_GET['pass'];


    $query = "UPDATE `admin` SET  nama='$nama' , email='$email', pass='$pass' WHERE id_admin='$id' ";

    if (mysqli_query($koneksi, $query)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Diupdate'); 
        window.location.href='profile.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Diupdate');
    window.location.href='profile.php'</script>";}
}
if (isset($_GET['admin_del'])) {
    $idp = $_GET['admin_del'];

    $hapus = "DELETE FROM `admin` WHERE id_admin='$idp'";

    if (mysqli_query($koneksi, $hapus)) {
        // pesan jika data tersimpan
        echo "<script>alert('Data Berhasil Di Hapus'); 
    window.location.href='profile.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Gagal Di Hapus');
    window.location.href='profile.php'</script>";
    }
}