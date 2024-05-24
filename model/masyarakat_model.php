<?php

include_once 'config/conn.php';

class MasyarakatModel
{
    static function getMasyarakatData()
    {
        global $conn;
        $sql = "SELECT * FROM masyarakat JOIN users";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    static function getMasyarakatById($id)
    {
        global $conn;
        $sql = "SELECT * FROM masyarakat JOIN users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    static function getMasyarakat()
    {
        global $conn;
        $sql = "SELECT * FROM masyarakat JOIN users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    static function updateMasyarakat($id, $telepon, $nik, $id_users, $name, $email)
    {
        global $conn;
        $sql = "UPDATE masyarakat SET telepon = ?, nik = ?, id_users = ?, name = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisssi", $telepon, $nik, $id_users, $name, $email, $id);
        $stmt->execute();
    }
}

