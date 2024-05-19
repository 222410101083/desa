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

        // Menyiapkan timestamp untuk pencatatan waktu pendaftaran
        $inserted_at = date('Y-m-d H:i:s', strtotime('now'));
        // Mengenkripsi password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Menambahkan role ke dalam query SQL
        $sql = "INSERT INTO users (name, email, password, role, inserted_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }

        // Mengikat parameter ke statement
        $stmt->bind_param('sssss', $name, $email, $hashedPassword, $role, $inserted_at);
        $stmt->execute();

        // Memeriksa apakah query berhasil
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
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

    static function update($data = [])
    {
    }

    static function delete($id = '')
    {
    }

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
    static function deleteUser($id = '')
    {
        global $conn;
        $result = '';
        $sql = "DELETE FROM users WHERE id = ?"; // SQL query untuk menghapus pengguna berdasarkan ID
        $stmt = $conn->prepare($sql); // Persiapkan statement       
        $stmt->bind_param('i', $id); // Bind parameter ke statement
        $stmt->execute(); // Eksekusi statement
        $result = $stmt->affected_rows > 0 ? true : false; // Cek apakah query berhasil
        $stmt->close(); // Tutup statement
        return $result; // Kembalikan hasil query
        }
    }