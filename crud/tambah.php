<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah data</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
  body {
    background-color: #B8F1B0;
  }
</style>
</head>
<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Tambah Data</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="inputNama" name="nama_barang" placeholder="Masukan Nama Barang">
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Harga Barang</label>
          <input type="text" class="form-control" id="inputHarga" name="harga_barang" placeholder="Masukan Harga Barang">
        </div>
        <div class="mb-3">
          <label for="inputBarang" class="form-label">Stok Barang</label>
          <input type="text" class="form-control" id="inputStok" name="stok_barang" placeholder="Masukan Stok Barang">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
        <input name="reset" type="reset" class="btn btn-warning" value="Reset">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $nama = $_POST['nama_barang'];
      $harga = $_POST['harga_barang'];
      $stok = $_POST['stok_barang'];

      // Membuat Query
      $query = "INSERT INTO barang (nama_barang, harga_barang, stok_barang) VALUES('".$nama."', '".$harga."', '".$stok."')";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Data Gagal di tambahkan!')</script>";
      }

    }    

  ?>

</body>
</html>