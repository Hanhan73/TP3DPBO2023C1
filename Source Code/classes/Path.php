<?php

class Path extends DB
{
    function getPath()
    {
        $query = "SELECT * FROM Path";
        return $this->execute($query);
    }

    function getPathById($id)
    {
        $query = "SELECT * FROM Path WHERE Path_id=$id";
        return $this->execute($query);
    }

    function addPath($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO Path VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updatePath($id, $data)
    {
        // ...
    }

    function deletePath($id)
    {
        $query = "DELETE FROM path WHERE path_id = '$id';";
        return $this->executeAffected($query);
    }
}
