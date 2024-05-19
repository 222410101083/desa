<?php
class Aduan {
    static function select($id='') {
        global $conn;
        $sql = "SELECT * FROM Aduan";
        if ($id != '') {
            $sql .= " WHERE id_aduan = $id";
        }
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

    static function insert($data=[]) {
        global $conn;
        $sql = "INSERT INTO Aduan (id_pengadu, judul, deskripsi, kategori) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $data['id_pengadu'], $data['judul'], $data['deskripsi'], $data['kategori']);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        $conn->close();
        return $result;
    }

    static function update($data=[]) {
        global $conn;
        $sql = "UPDATE Aduan SET id_pengadu=?, judul=?, deskripsi=?, kategori=? WHERE id_aduan=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssi", $data['id_pengadu'], $data['judul'], $data['deskripsi'], $data['kategori'], $data['id_aduan']);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        $conn->close();
        return $result;
    }

    static function delete($id='') {
        global $conn;
        $sql = "DELETE FROM Aduan WHERE id_aduan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        $conn->close();
        return $result;
    }

    static function rawQuery($sql) {
        global $conn;
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
     // Fungsi untuk menampilkan aduan yang ditulis oleh pengguna tertentu
     static function selectByUserId($userId) {
        global $conn;
        $sql = "SELECT * FROM Aduan WHERE id_pengadu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $stmt->close();
        $conn->close();
        return $rows;
    }
}
