<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Path.php');
include('classes/Element.php');
include('classes/Karakter.php');
include('classes/Template.php');

$Karakter = new Karakter($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$Karakter->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $Karakter->getKarakterById($id);
        $row = $Karakter->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['karakter_nama'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['karakter_foto'] . '" class="img-thumbnail" alt="' . $row['karakter_foto'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['karakter_nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>HP</td>
                                    <td>:</td>
                                    <td>' . $row['karakter_hp'] . '</td>
                                </tr>
                                <tr>
                                    <td>Atk</td>
                                    <td>:</td>
                                    <td>' . $row['karakter_atk'] . '</td>
                                </tr>
                                <tr>
                                    <td>Def</td>
                                    <td>:</td>
                                <td>' . $row['karakter_def'] . '</td>
                                </tr>
                                <tr>
                                    <td>Path</td>
                                    <td>:</td>
                                    <td>' . $row['path_nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>Element</td>
                                    <td>:</td>
                                    <td>' . $row['element_nama'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="updateKarakter.php?id=' . $row['karakter_id'] . '"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="delete.php?id=' . $row['karakter_id'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$Karakter->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_KARAKTER', $data);
$detail->write();
