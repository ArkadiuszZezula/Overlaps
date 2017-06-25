<?php

include_once "infrastructure/IDBConnector.php";

class IDConnector implements IDBConnector {

    public function query($txt){
        include "connection.php"; //return $conn = mysqli
        $sql = $txt;
        $result = $conn->query($sql);
        if ($result == true && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
        else {
            echo 'error';
            return false;
        }
    }

    public function execute($txt) {
        include "connection.php";
        $result = $conn->query($txt);
        if ($result == true) {
            return true;
        } else {
            echo $conn->error;
            return false;
        }
    }

    public function escape($txt){
        include "connection.php";
        $result = $conn->query($txt);
        return $result;
    }

}
