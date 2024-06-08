<?php
class Aduan
{
    static function getAllAduan()
    {
        global $conn;
        $sql = "SELECT * FROM aduan";

        $result = $conn->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $result->free();
        return $rows;
    }
    public static function addAduan($data)
    {
        global $conn;
        $sql = "INSERT INTO aduan (id_pengadu, judul, deskripsi , tanggal , kategori, nama_pengadu) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssss", $data['id_pengadu'], $data['judul'], $data['deskripsi'], $data['tanggal'], $data['kategori'], $data['nama_pengadu']);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    public static function getAduanByUserId($user_id)
    {
        global $conn;
        $sql = "SELECT * FROM aduan WHERE id_pengadu = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("MySQL prepare error: " . $conn->error);
        }

        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Execute error: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return null;
        }

        $aduans = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $aduans;
    }

    public static function cariAduan($searchText)
    {
        global $conn;
        $sql = "SELECT * FROM aduan WHERE judul LIKE ? OR deskripsi LIKE ? OR tanggal LIKE ? OR kategori LIKE ? OR nama_pengadu LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchText = "%$searchText%";
        $stmt->bind_param("sssss", $searchText, $searchText, $searchText, $searchText, $searchText);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public static function getUserFilteredAduan($searchText, $user_id)
    {
        global $conn;
        $sql = "SELECT * FROM aduan WHERE id_pengadu = ? AND (judul LIKE ? OR deskripsi LIKE ? OR tanggal LIKE ? OR kategori LIKE ?)";
        $stmt = $conn->prepare($sql);
        $searchText = "%$searchText%";
        $stmt->bind_param("sssss", $user_id, $searchText, $searchText, $searchText, $searchText);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}
