<!-- Panggil file koneksi, karena kita membutuhkan nya -->
<?php
  include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Utama</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center">Barang</h1>
      <a href="tambah.php" class="btn btn-primary">Tambah</a>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga Barang</th>
            <th scope="col">Stok Barang</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
          <?php
              // variable no digunakan untuk meng-increments field no pada table. Karena nanti kita akan melooping data hasil query select kita. 
              $no = 1;
              // Simpan query kita kedalam variable agar lebih rapi, dan bisa reusable.
              // Arti dari query di bawah adalah pilih semua data dari table tb_siswa.
              $query = "SELECT * FROM barang";
              // Eksekusi Query
              // Simpan hasil eksekusi query kita ke dalam variable. Di sini variable nya saya kasih nama result.
              $result = mysqli_query($koneksi, $query);
              // Done. Waktunya Looping
          ?>
        <tbody>
          <?php
            foreach ($result as $data){
              echo "
                <tr>
                  <th scope='row'>". $no++ ."</th>
                  <td>". $data["nama_barang"] ."</td>
                  <td>". $data["harga_barang"] ."</td>
                  <td>". $data["stok_barang"] ."</td>
                  <td> 
                    <a href='update.php?id=".$data["id"]."' type='button' class='btn btn-success my5'>Update</a>
                    <a href='delete.php?id=".$data["id"]."' type='button' class='btn btn-danger' onlick='return confirm('Yakin ingin menghapus data?')'>Delete</a>
                  </td>
                </tr>  
              ";
            }
          ?>
        </tbody>  
      </table>
    </div>
  </section>

</body>
</html>