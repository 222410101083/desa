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
}
?>