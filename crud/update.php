<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update data</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <style>
  body {
    background-color: #B8F1B0;
  }
</style>

</head>
<body>

  <?php

    // Ambil data dari patameter url browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM barang WHERE id = $id";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data) {
  ?>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data</h1>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
        <div class="mb-3">
          <label for="inputNis" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="barang" value="<?= $data['nama_barang'] ?>" name="nama_barang" placeholder="Masukan Nama Barang">
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Harga Barang</label>
          <input type="text" class="form-control" id="harga" value="<?= $data['harga_barang'] ?>" name="harga_barang" placeholder="Masukan Harga Barang">
        </div>
        <div class="mb-3">
          <label for="inputKelas" class="form-label">Stok Barang</label>
          <input type="text" class="form-control" id="stok" value="<?= $data['stok_barang'] ?>" name="stok_barang" placeholder="Masukan Stok Barang">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Update">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php } ?>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nama = $_POST['nama_barang'];
      $harga = $_POST['harga_barang'];
      $stok = $_POST['stok_barang'];

      // Membuat Query
      $query = "UPDATE barang SET nama_barang = '$nama', harga_barang = '$harga', stok_barang = '$stok' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

  ?>

</body>
</html>