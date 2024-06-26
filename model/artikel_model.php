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
        // Membuat slug dari judul
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

        $stmt = $conn->prepare("INSERT INTO artikel (judul, konten, gambar, penulis, slug, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $judul, $konten, $gambar, $penulis, $slug);
        $stmt->execute();
    }
    

    static function updateArtikel($id_artikel, $judul, $konten, $gambar, $penulis)
    {
        global $conn;
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
        $stmt = $conn->prepare("UPDATE artikel SET judul=?, konten=?, gambar=?, penulis=?, slug=?, created_at=NOW() WHERE id_artikel=?");
        if ($stmt) {
            $stmt->bind_param("sssssi", $judul, $konten, $gambar, $penulis, $slug, $id_artikel);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false; // Tidak ada baris yang terpengaruh, mungkin ID tidak ditemukan
            }
        } else {
            return false; // Gagal dalam menyiapkan statement
        }
    }
    static function getArtikelById($id) {
        global $conn;
        $sql = "SELECT * FROM artikel JOIN users ON artikel.penulis = users.id WHERE id_artikel = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    static function getArtikelByPage($limit, $page) {
        global $conn;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM artikel LIMIT $limit OFFSET $offset";
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
    public static function getTotalArtikel() {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM artikel";
        $result = $conn->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
    static function deleteArtikel($id_artikel)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM artikel WHERE id_artikel = ?");
        $stmt->bind_param("i", $id_artikel);
        $stmt->execute();
    }
    static function getArtikelBySlug($slug) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM artikel WHERE slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
