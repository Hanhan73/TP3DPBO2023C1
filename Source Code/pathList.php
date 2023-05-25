<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Path.php');
include('classes/Template.php');

$Path = new Path($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$Path->open();
$Path->getPath();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($Path->addPath($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'Path.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'Path.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Path';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Path</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'Path';

while ($div = $Path->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['path_nama'] . '</td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($Path->updatePath($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'Path.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'Path.php';
            </script>";
            }
        }

        $Path->getPathById($id);
        $row = $Path->getResult();

        $dataUpdate = $row['Path_nama'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($Path->deletePath($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'Path.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'Path.php';
            </script>";
        }
    }
}

$Path->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
