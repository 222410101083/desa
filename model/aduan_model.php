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
        $sql = "INSERT INTO Aduan (id_pengadu, judul, deskripsi, kategori, nama_pengadu) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $data['id_pengadu'], $data['judul'], $data['deskripsi'], $data['kategori'], $data['nama_pengadu']);
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
    
    // public static function cariAduan($keyword) {
    //     global $conn;
    //     $stmt = $conn->prepare("SELECT * FROM aduan WHERE nama_pengadu LIKE ? OR judul LIKE ?");
    //     $searchTerm = '%' . $keyword . '%';
    //     $stmt->bind_param("ss", $searchTerm, $searchTerm);
    //     $stmt->execute();
    //     return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    // }
}
