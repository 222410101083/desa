<?php

include_once 'config/conn.php';

class PemerintahModel {
    
    static function getPemerintahById($id) {
        global $conn;
        $sql = "SELECT * FROM pemerintah WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    static function getPemerintah(){
        global $conn;
        $sql = "SELECT * FROM pemerintah";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

