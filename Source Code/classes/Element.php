<?php

class Element extends DB
{
    function getElement()
    {
        $query = "SELECT * FROM Element";
        return $this->execute($query);
    }

    function getElementById($id)
    {
        $query = "SELECT * FROM element WHERE Element_id=$id";
        return $this->execute($query);
    }

    function addElement($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO Element VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateElement($id, $data)
    {
        // ...
    }

    function deleteElement($id)
    {
        $query = "DELETE FROM Element WHERE element_id = '$id';";
        return $this->executeAffected($query);
    }
}
