<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$database = "beli";
$username = "root";
$password = "";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$ram = $_POST['ram'];
$warna = $_POST['warna'];
$jumlah = $_POST['jumlah'];

// Bersihkan karakter $ dari total harga
$total_harga = str_replace('$', '', $_POST['harga']);

// SQL untuk menyimpan data ke tabel orders
$sql = "INSERT INTO orders (ram, warna, jumlah, total_harga)
VALUES ('$ram', '$warna', $jumlah, '$total_harga')";


// Eksekusi SQL
if ($conn->query($sql) === TRUE) {
    echo "Pesanan akan segera diproses";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Tutup koneksi ke database
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Cekout</title>
    <style>
       /* CSS untuk Hasil Cekout */
/* CSS untuk Hasil Cekout */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

ul {
    list-style-type: none;
    padding: 10px   ;
}

li {
    margin-bottom: 10px;
}

li strong {
    font-weight: bold;
    margin-right: 10px;
}

/* Tombol Kembali */
.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container a {
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

.button-container a:hover {
    background-color: #0056b3;
}

/* Sembunyikan pesan berhasil */
.success-message {
    display: none;
}


    </style>
</head>
<body>
    <p>Terima kasih atas pesanan Anda. Berikut adalah detail pesanan Anda:</p>
    <ul>
        <li><strong>Kapasitas RAM:</strong> <?php echo $_POST['ram']; ?></li>
        <li><strong>Varian Warna:</strong> <?php echo $_POST['warna']; ?></li>
        <li><strong>Jumlah:</strong> <?php echo $_POST['jumlah']; ?></li>
        <li><strong>Total Harga:</strong> <?php echo $_POST['harga']; ?></li>
    </ul>
</body>
</html>
