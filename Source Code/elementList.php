<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Element.php');
include('classes/Template.php');

$Element = new Element($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$Element->open();
$Element->getElement();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($Element->addElement($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'Element.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'Element.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Element';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Element</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'Element';

while ($div = $Element->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['element_nama'] . '</td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($Element->updateElement($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'Element.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'Element.php';
            </script>";
            }
        }

        $Element->getElementById($id);
        $row = $Element->getResult();

        $dataUpdate = $row['Element_nama'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($Element->deleteElement($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'Element.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'Element.php';
            </script>";
        }
    }
}

$Element->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
