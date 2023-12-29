<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql-injection";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM mahasiswa"; // Ganti 'nama_tabel' dengan nama tabel Anda
$result = mysqli_query($conn, $sql);

if (isset($_POST['cariku'])) {
  $nama = $_POST['nama'];

  // Prepared statement untuk menambah data ke dalam tabel
  $sql = "INSERT INTO mahasiswa (nama, ipk, ip) VALUES ('$nama', 3.3, 4.4)";
  mysqli_query($conn, $sql);
  header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">

    <h1>Nilai Mahasiswa</h1>
    <form action="" method="POST">
      <div class="input-group mb-3">
        <input type="text" id="cari_nama" name="nama" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="inputGroup-sizing-lg">
        <button type="submit" name="cariku" class="btn btn-outline-secondary" type="button" id="inputGroup-sizing-lg">tambah</button>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">ipk</th>
          <th scope="col">ip</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result) : ?>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <th scope="row"><?= $row["id"]; ?></th>
              <td><?= $row["nama"]; ?></td>
              <td><?= $row["ipk"]; ?></td>
              <td><?= $row["ip"]; ?></td>
            </tr>
          <?php endwhile ?>
        <?php endif ?>
      </tbody>
    </table>
    <div id="hasil_pencarian">
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>