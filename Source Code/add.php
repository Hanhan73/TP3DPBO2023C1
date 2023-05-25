<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Karakter.php');

// buat instance Karakter
$listKarakter = new Karakter($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listKarakter->open();

// ambil data Karakter

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    if (isset($_FILES['gambar'])) {
         $file = $_FILES['gambar'];

        // Periksa apakah ada error dalam upload gambar
        if ($file['error'] === UPLOAD_ERR_OK) {
            
            $filename = time() . $file['name'];
            $tempFilePath = $file['tmp_name'];

                // Pindahkan file gambar ke direktori tujuan
            $targetDir = 'assets/images/';
            $targetPath = $targetDir . $filename;
            move_uploaded_file($tempFilePath, $targetPath);
        
            $result = $listKarakter->addData($data,$filename);
        }
        
        if ($result == 0) {
            // Data berhasil ditambahkan
            $message = 'Data berhasil ditambahkan';
        } else {
            // Gagal menambahkan data
            $message = 'Terjadi kesalahan saat menambahkan data';
        }
}
} else {
    // Redirect ke halaman form jika form tidak dikirimkan
    header('location: formKarakter.php');
}

// Redirect ke halaman indeks dengan pesan sebagai parameter URL
header('location: index.php?message=' . urlencode($message));

// tutup koneksi
$listKarakter->close();

