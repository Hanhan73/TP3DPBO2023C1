<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Path.php');
include('classes/Element.php');
include('classes/Karakter.php');
include('classes/Template.php');

// buat instance Karakter
$listKarakter = new Karakter($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listKarakter->open();
// tampilkan data Karakter
$listKarakter->getKarakterJoin();

// cari Karakter
if (isset($_POST['btn-cari'])) {
    // methode mencari data Karakter
    $listKarakter->searchKarakter($_POST['cari']);
} else {
    // method menampilkan data Karakter
    $listKarakter->getKarakterJoin();
}

// sort Karakter
if (isset($_GET['btn-sort'])) {
    // methode mencari data Karakter
    $listKarakter->getKarakterSort($_GET['sort']);
}

$data = null;

// ambil data Karakter
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listKarakter->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 Karakter-thumbnail">
        <a href="detail.php?id=' . $row['karakter_id'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['karakter_foto'] . '" class="card-img-top" alt="' . $row['karakter_foto'] . '">
            </div>
            <div class="card-body">
                <p class="card-text Karakter-nama my-0">' . $row['karakter_nama'] . '</p>
                <p class="card-text Path-nama">' . $row['path_nama'] . '</p>
                <p class="card-text Element-nama my-0">' . $row['element_nama'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listKarakter->close();

// buat instance template
$home = new Template('templates/skin.html');

if (isset($message)) {
    echo '<div class="alert alert-success">' . $message . '</div>';
}

// simpan data ke template
$home->replace('DATA_Karakter', $data);
$home->write();
