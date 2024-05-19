<?php
include_once 'config/conn.php';
class Proposal
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Metode untuk menambahkan proposal baru dengan path file
    public static function tambahProposal($judul, $deskripsi, $tanggal_pengajuan, $file_path, $status, $id_user)
    {
        // error_log("Inserting: $judul, $deskripsi, $tanggal_pengajuan, $file_path, $status, $id_user");
        $sql = "INSERT INTO proposal (judul, deskripsi, tanggal_pengajuan, file_path, status, id_user) VALUES (?, ?, ?, ?, ?, ?)";
        global $conn; // Pastikan $conn adalah instance dari koneksi database yang aktif
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("MySQL prepare error: " . $conn->error);
        }
        $stmt->bind_param('sssssi', $judul, $deskripsi, $tanggal_pengajuan, $file_path, $status, $id_user);
        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Execute error: " . $stmt->error);
        }
        $stmt->close();
    }

    // Metode untuk mengambil semua proposal
    static function getAllProposals()
    {
        global $conn;
        $sql = "SELECT * FROM proposal";

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

    public static function getProposalById($id)
    {
        global $conn;
        $query = "SELECT * FROM proposal WHERE id_proposal = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Metode untuk mengambil proposal berdasarkan ID pengguna
    public static function getProposalsByUserId($user_id)
    {
        global $conn;
        $sql = "SELECT * FROM proposal WHERE id_user = ?";
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

        $proposals = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $proposals;
    }

    public static function updateProposal($id_proposal, $judul, $deskripsi, $tanggal_pengajuan, $file_path, $status)
    {
        global $conn;
        if ($file_path !== null) {
            // Jika file_path diberikan, update semua informasi termasuk file_path
            $sql = "UPDATE proposal SET judul=?, deskripsi=?, tanggal_pengajuan=?, file_path=?, status=? WHERE id_proposal=?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                throw new Exception("MySQL prepare error: " . $conn->error);
            }
            $stmt->bind_param('sssssi', $judul, $deskripsi, $tanggal_pengajuan, $file_path, $status, $id_proposal);
        } else {
            // Jika tidak ada perubahan pada file, tidak perlu update file_path
            $sql = "UPDATE proposal SET judul=?, deskripsi=?, tanggal_pengajuan=?, status=? WHERE id_proposal=?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                throw new Exception("MySQL prepare error: " . $conn->error);
            }
            $stmt->bind_param('ssssi', $judul, $deskripsi, $tanggal_pengajuan, $status, $id_proposal);
        }

        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Execute error: " . $stmt->error);
        }
        $stmt->close();
    }

    static function destroyProposal($id)
    {
        global $conn;
        $sql = "DELETE FROM proposal WHERE id_proposal = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
    public static function newStatusProposal($id_proposal, $status_baru)
    {
        global $conn;
        $sql = "UPDATE proposal SET status=? WHERE id_proposal=?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("MySQL prepare error: " . $conn->error);
        }
        $stmt->bind_param('si', $status_baru, $id_proposal);
        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Execute error: " . $stmt->error);
        }
        $stmt->close();
    }

    public static function updateStatusProposal($id_proposal, $status_baru)
    {
        $status_baru = trim($status_baru); // Memangkas spasi ekstra
        global $conn; // Menggunakan koneksi yang sudah ada

        // Periksa panjang status baru
        if (strlen($status_baru) > 10) { // Anggap 10 sebagai batas maksimal karakter
            throw new Exception("Status terlalu panjang. Maksimal 10 karakter.");
        }

        $stmt = $conn->prepare("UPDATE proposal SET status = ? WHERE id_proposal = ?");
        $stmt->bind_param("si", $status_baru, $id_proposal);

        if (!$stmt->execute()) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
}
?>