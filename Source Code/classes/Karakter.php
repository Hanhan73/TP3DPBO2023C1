<?php

class Karakter extends DB
{
    function getKarakterJoin()
    {
        $query = "SELECT * FROM Karakter JOIN path ON Karakter.path_id=path.path_id JOIN element ON Karakter.element_id=element.element_id ORDER BY Karakter.Karakter_id";

        return $this->execute($query);
    }
    
    function getKarakterSort($sort)
    {
        $query = "SELECT * FROM Karakter JOIN path ON Karakter.path_id=path.path_id JOIN element ON Karakter.element_id=element.element_id ORDER BY Karakter.Karakter_nama $sort";

        return $this->execute($query);
    }

    function getKarakter()
    {
        $query = "SELECT * FROM Karakter";
        return $this->execute($query);
    }

    function getKarakterById($id)
    {
        $query = "SELECT * FROM Karakter JOIN path ON Karakter.path_id=path.path_id JOIN element ON Karakter.element_id=element.element_id WHERE Karakter_id=$id";
        return $this->execute($query);
    }

    function searchKarakter($keyword)
    {
        $query = "SELECT * FROM Karakter JOIN path ON Karakter.path_id=path.path_id JOIN element ON Karakter.element_id=element.element_id WHERE karakter_nama LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addData($data,$file)
    {
        $nama = $data['nama'];
        $hp = $data['hp'];
        $atk = $data['atk'];
        $def = $data['def'];
        $path = $data['path'];
        $element = $data['element'];
        $query = "INSERT INTO Karakter VALUES('', '$nama', '$hp', '$atk', '$def', '$path', '$element','$file')";
        return $this->executeAffected($query);
    }

    function updateData($data,$file)
    {
        $id = $data['id'];
        $nama = $data['nama'];
        $hp = $data['hp'];
        $atk = $data['atk'];
        $def = $data['def'];
        $path = $data['path'];
        $element = $data['element'];
        $query = "UPDATE Karakter SET karakter_nama = '$nama', karakter_hp = '$hp', karakter_atk = '$atk', karakter_def = '$def', path_id = '$path', element_id = '$element',karakter_foto='$file' WHERE karakter_id = $id";
        return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        $query = "DELETE FROM Karakter WHERE karakter_id = ".$id;
        return $this->executeAffected($query);
    }
}
