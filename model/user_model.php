<?php

include_once 'config/conn.php';

class User
{
    static function login($data = [])
    {
        extract($data);
        global $conn;

        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) {
                // Tambahkan role ke array hasil sebelum mengembalikannya
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function register($data = [])
    {
        extract($data);
        global $conn;

        // Periksa apakah email sudah terdaftar
        $query = "SELECT email FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return 'Email sudah terdaftar';
        }

        // Jika email belum terdaftar, lanjutkan dengan pendaftaran
        $inserted_at = date('Y-m-d H:i:s', strtotime('now'));
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, role, inserted_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        $stmt->bind_param('sssss', $name, $email, $hashedPassword, $role, $inserted_at);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function createUserByAdmin($name, $email, $password, $role)
    {
        global $conn;

        $inserted_at = date('Y-m-d H:i:s');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, role, inserted_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            error_log('Failed to prepare statement: ' . $conn->error);  // Log error
            return false;
        }
        $stmt->bind_param('sssss', $name, $email, $hashedPassword, $role, $inserted_at);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            error_log('Failed to insert user: ' . $stmt->error);  // Log error
            return false;
        }
    }

    static function getPassword($email)
    {
        global $conn;
        $sql = "SELECT password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    // static function updateUser($id, $email, $password)
    // {
    //     global $conn;
    //     $sql = "UPDATE users SET email = ?, password = ? WHERE id = ?";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("ssi", $email, $password, $id);
    //     $stmt->execute();
    // }
    public static function getUsersByRole($role)
    {
        // Dapatkan koneksi database
        global $conn;
        // Siapkan query untuk mengambil data pengguna berdasarkan role
        $stmt = $conn->prepare("SELECT * FROM users WHERE role = ?");
        $stmt->bind_param("s", $role);
        $stmt->execute();

        // Dapatkan hasil query
        $result = $stmt->get_result();
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        // Tutup statement dan koneksi
        $stmt->close();
        $conn->close();

        // Kembalikan array pengguna
        return $users;
    }
    static function getUserByEmail($email)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();

        return $user;
    }
    public static function updateProfil($id, $name, $email, $nomor_hp, $avatar)
    {
        global $conn;

        $sql = "UPDATE users SET name = ?, email = ?, nomor_hp = ?, avatar = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            error_log('Prepare failed: ' . htmlspecialchars($conn->error));
            return false;
        }

        $bind = $stmt->bind_param("ssssi", $name, $email, $nomor_hp, $avatar, $id);
        if ($bind === false) {
            error_log('Bind param failed: ' . htmlspecialchars($stmt->error));
            return false;
        }

        $execute = $stmt->execute();
        if ($execute === false) {
            error_log('Execute failed: ' . htmlspecialchars($stmt->error));
            return false;
        }

        $stmt->close();
        $conn->close();
        return true;
    }
    public static function emailExists($email) {
        global $conn;
        $sql = "SELECT 1 FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public static function checkEmailExists($email, $currentUserId) {
        global $conn;
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $currentUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function updatePassword($id, $newPassword)
    {
        global $conn;
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newPassword, $id);
        $stmt->execute();
    }
}
