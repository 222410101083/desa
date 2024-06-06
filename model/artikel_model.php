<?php
class Artikel
{
    static function getAllArtikel()
    {
        global $conn;
        $sql = "SELECT * FROM artikel JOIN users ON artikel.penulis = users.id;";
        $result = $conn->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $result->free();
        $conn->close();
        return $rows;
    }

    static function addArtikel($judul, $konten, $gambar, $penulis)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO artikel (judul, konten, gambar, penulis, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $judul, $konten, $gambar, $penulis);
        $stmt->execute();
    }
    

    static function updateArtikel($id, $judul, $gambar, $isi, $penulis)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE artikel SET judul=?, gambar=?, isi=?, penulis=? WHERE id=?");
        $stmt->bind_param("ssssi", $judul, $gambar, $isi, $penulis, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    static function getArtikelById($id) {
        global $conn;
        $sql = "SELECT * FROM artikel WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
