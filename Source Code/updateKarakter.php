<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Path.php');
include('classes/Element.php');
include('classes/Karakter.php');
include('classes/Template.php');


$listKarakter = new Karakter($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$listPath = new Path($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$listElement = new Element($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
// buka koneksi
$listKarakter->open();
$listPath->open();
$listElement->open();

$listKarakter->getKarakterJoin();
$listPath->getPath();
$listElement->getElement();

$dataPath = null;
$dataElement = null;
$data = null;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $listKarakter->getKarakterById($id);
        $chara = $listKarakter->getResult();
        while ($row = $listPath->getResult()) {
            if ($row['path_id'] == $chara['path_id']) {
                $dataPath .= '<option value="'.$row['path_id'].'" selected>'.$row['path_nama'].'</option>';
            }else {
                $dataPath .= '<option value="'.$row['path_id'].'">'.$row['path_nama'].'</option>';
            }
        }
        while ($row = $listElement->getResult()) {
            if ($row['element_id'] == $chara['element_id']) {
                $dataElement .= '<option value="'.$row['element_id'].'" selected>'.$row['element_nama'].'</option>';
            }else {
                $dataElement .= '<option value="'.$row['element_id'].'">'.$row['element_nama'].'</option>';
            }
        }

        $data .= '<form action="update.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="nama">Nama:</label>
        <input
          type="text"
          class="form-control"
          id="nama"
          name="nama"
          value="'.$chara['karakter_nama'].'"
          required
        />
      </div>
      <div class="form-group">
        <label for="hp">HP:</label>
        <input
          type="number"
          class="form-control"
          id="hp"
          name="hp"
          value="'.$chara['karakter_hp'].'"
          required
        />
      </div>
      <div class="form-group">
        <label for="atk">ATK:</label>
        <input
          type="number"
          class="form-control"
          id="atk"
          name="atk"
          value='.$chara['karakter_atk'].'
          required
        />
      </div>
      <div class="form-group">
        <label for="def">DEF:</label>
        <input
          type="number"
          class="form-control"
          id="def"
          name="def"
          value='.$chara['karakter_def'].'
          required
        />
      </div>
      <div class="form-group">
        <div class="form-group">
          <label for="path">Path:</label>
          <select class="form-control" id="path" name="path">
             '.$dataPath.'
          </select>
      </div>
      </div>          
      <div class="form-group">
        <div class="form-group">
          <label for="element">Element:</label>
          <select class="form-control" id="element" name="element">
          '.$dataElement.'
          </select>
      </div>
      </div>
      <div class="form-group">
      <input
        type="text"
        class="form-control"
        id="gambarlama"
        name="gambarlama"
        hidden="true"
        value="'. $chara['karakter_foto'].'"
        required
      />
    </div>          
      <div class="form-group">
        <div class="form-group">
          <label for="gambar">Gambar:</label>
          <input type="file" name="gambar" id="gambar">
        </div>
      </div>
      <div class="form-group d-flex justify-content-end">
      <a href="index.php" class="btn btn-danger me-2">Cancel</a>
          <button type="submit" class="btn btn-info">Update</button>
      </div>
        <div class="form-group">
        <input
          type="text"
          class="form-control"
          id="id"
          name="id"
          hidden="true"
          value="'. $chara['karakter_id'].'"
          required
        />
      </div>
      </div>
      
        </form>';
    }
}
 else {
    // Redirect ke halaman indeks jika parameter ID tidak ada
    header('location: index.php');
}


if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo '<div class="alert alert-success">' . $message . '</div>';
}

// tutup koneksi
$listKarakter->close();
$listPath->close();
$listElement->close();

// buat instance template
$form = new Template('templates/skinform.html');

// simpan data ke template
$form->replace('FORMKARAKTER', $data);
$form->replace('TITLEAPA', 'Update Karakter');
$form->write();
