<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************
    // Tangkap nilai nama dari form
    // silakan taruh kode kalian di bawah
    if (empty($_POST["nama"])) {
        $namaErr = "Nama wajib untuk diisi!";
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    // **********************  2  **************************
    // Tangkap nilai email dari form
    // silakan taruh kode kalian di bawah
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib untuk diisi!";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid!";
        }
    }

    // **********************  3  **************************
    // Tangkap nilai NIM dari form
    // silakan taruh kode kalian di bawah
    if (empty($_POST["nim"])) {
        $nimErr = "NIM wajib untuk diisi!";
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
        if (!is_numeric($nim)) {
            $nimErr = "NIM harus berupa angka!";
        }
    }

    // **********************  4  **************************
    // Tangkap nilai jurusan (dropdown)
    // silakan taruh kode kalian di bawah
    if (empty($_POST["jurusan"])) {
        $jurusanErr = "Jurusan wajib untuk dipilih!";
    } else {
        $jurusan = htmlspecialchars($_POST["jurusan"]);
    }

    // **********************  5  **************************
    // Tangkap nilai alasan (textarea)
    // silakan taruh kode kalian di bawah
    if (empty($_POST["alasan"])) {
        $alasanErr = "Alasan wajib untuk diisi!";
    } else {
        $alasan = htmlspecialchars($_POST["alasan"]);
    }
    
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  <form method="post" action="">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $nimErr; ?></span>

    <label>Jurusan:</label>
    <select name="jurusan">
      <option value="">-- Pilih Jurusan --</option>
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Informatika">Informatika</option>
      <option value="Teknik Industri">Teknik Industri</option>
    </select>
    <span class="error"><?php echo $jurusanErr; ?></span>

    <label>Alasan Bergabung:</label>
    <textarea name="alasan"><?php echo $alasan; ?></textarea>
    <span class="error"><?php echo $alasanErr; ?></span>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // **********************  6  **************************
  // Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
  // silakan taruh kode kalian di bawah
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($namaErr == "" && $emailErr == "" && $nimErr == "" && $jurusanErr == "" && $alasanErr == "") {
           echo "<div style='background-color:#28a745; color:white; text-align:center; 
                        padding:10px; margin-top:15px; border-radius:4px; font-weight:bold;'>
                    Data Pendaftaran Berhasil!
                </div>";

          echo "<div class='output' style='margin-top:10px; font-family:Arial, sans-serif; font-size:14px; color:#212529;'>
                    <img src='EAD.png' alt='Logo EAD' class='logo' style='width:80px; margin-bottom:8px;'>
                    <h3 style='color:#000; font-size:16px; font-weight:bold; margin-bottom:12px;'>Data Pendaftaran Berhasil</h3>
                    <table style='width:100%; border-collapse:collapse;'>
                      <tr><td style='width:160px; padding:4px 0;'>Nama</td><td>: $nama</td></tr>
                      <tr><td style='padding:4px 0;'>Email</td><td>: $email</td></tr>
                      <tr><td style='padding:4px 0;'>NIM</td><td>: $nim</td></tr>
                      <tr><td style='padding:4px 0;'>Jurusan</td><td>: $jurusan</td></tr>
                      <tr><td style='padding:4px 0;'>Alasan Bergabung</td><td>: $alasan</td></tr>
                    </table>
                </div>";
      }
   }

  ?>
</div>
</body>
</html>