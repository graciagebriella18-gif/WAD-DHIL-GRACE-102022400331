<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomor = $film = $jumlah = "";
$namaErr = $emailErr = $nomorErr = $filmErr = $jumlahErr = "";

// **********************  2  **************************
// Jika form disubmit

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
    $nama = trim($_POST["nama"]);
    if (empty($nama)){
      $namaErr = "Nama wajib untuk diisi";
    }

    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $email = trim($_POST["email"]);
    if (empty($email)) {
      $emailErr = "Email wajib untuk diisi";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Format email tidak valid";
    }

    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $nomor = trim($_POST["nomor"]);
    if (empty($email)) {
      $nomorErr = "Nomor HP wajib untuk diisi";
    } elseif(!ctype_digit($nomor)){
      $nomorErr = "Nomor HP wajib untuk diisi";
    }

    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $film = $_POST["film"] ?? "";
    if (empty($film)) {
      $filmErr = "Pilih jenis film";
    }

    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $jumlah = $_POST["jumlah"] ?? "";
    if (empty($jumlah)) {
      $jumlahErr = "Jumlah tiket wajib untuk diisi ";
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  --> 
  <img src="EAD.png" alt="Logo Bioskop EAD" class="logo">

  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="">
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr" : "" ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr" : "" ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomor" value="<?php echo $nomor; ?>">
    <span class="error"><?php echo $nomorErr ? "* $nomorErr" : "" ?></span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $filmErr; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumlah; ?>">
    <span class="error"><?php echo $jumlahErr ? "* $jumlahErr" : "" ?></span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
  <?php if($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$filmErr && !$jumlahErr) { ?>
  <div class = "container">
    <h3>Data Pemesanan : </h3>
    <div class = "table-container">
      <table>
        <thead>
          <tr>
            <th width = "15%">Nama</th>
            <th width = "20%">Email</th>
            <th width = "15%">Nomor HP</th>
            <th width = "15%">Jenis Film</th>
            <th width = "15%">Jumlah Tiket</th>
          </tr>
        </thead>
      <tbody>
            <td><?php echo $nama; ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $nomor ?></td>
            <td><?php echo $film ?></td>
            <td><?php echo $jumlah ?></td>
          </tr>
      <tbody>
    </table>
  </div>
</div>
<?php } ?>
</body>
</html>
