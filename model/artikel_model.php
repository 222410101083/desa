<?php
class Artikel {
    static function getAllArtikel() {
        global $conn;
        $sql = "SELECT * FROM artikel";
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

    static function addArtikel($judul, $gambar, $isi, $penulis) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO artikel (judul, gambar, isi, penulis) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $judul, $gambar, $isi, $penulis);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    static function updateArtikel($id, $judul, $gambar, $isi, $penulis) {
        global $conn;
        $stmt = $conn->prepare("UPDATE artikel SET judul=?, gambar=?, isi=?, penulis=? WHERE id=?");
        $stmt->bind_param("ssssi", $judul, $gambar, $isi, $penulis, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
