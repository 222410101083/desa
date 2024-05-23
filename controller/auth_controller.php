<?php

include_once 'model/user_model.php';

class AuthController {
    static function login() {
        view('auth_page/layout', ['url' => 'login']);
    }

    static function register() {
        view('auth_page/layout', ['url' => 'register']);
    }

    static function saveLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'email' => $post['email'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            switch ($user['role']) {
                case 'admin':
                    header('Location: '.BASEURL.'admin/dashboard');
                    break;
                case 'pemerintah':
                    header('Location: '.BASEURL.'pemerintah/dashboard');
                    break;
                case 'masyarakat':
                    header('Location: '.BASEURL.'masyarakat/dashboard');
                    break;
                default:
                    header('Location: '.BASEURL.'login?role=undefined');
                    break;
            }
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }

    static function saveRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        // Periksa apakah email sudah terdaftar
        $existingUser = User::getUserByEmail($post['email']);
        if ($existingUser) {
            header('Location: '.BASEURL.'register?error=user_exists');
            exit; // Berhenti eksekusi lebih lanjut
        }

        // Lanjutkan proses registrasi jika email belum terdaftar
        $user = User::register([
            'name' => $post['name'], 
            'email' => $post['email'], 
            'password' => $post['password'],
            'role' => $post['role']
        ]);

        if ($user) {
            header('Location: '.BASEURL.'login');
        }
        else {
            header('Location: '.BASEURL.'register?failed=true');
        }
    }

    // static function logout() {
    //     $_SESSION = array();

    //     if (ini_get("session.use_cookies")) {
    //         $params = session_get_cookie_params();
    //         setcookie(session_name(), '', time() - 42000,
    //             $params["path"], $params["domain"],
    //             $params["secure"], $params["httponly"]
    //         );
    //     }

    //     session_destroy();
    //     header('Location: '.BASEURL);
    // }
    static function logout() {
        // Hapus semua data sesi
        $_SESSION = array();

        // Hapus cookie sesi jika digunakan
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Hancurkan sesi
        session_destroy();

        // Arahkan kembali ke halaman utama
        header('Location: '.BASEURL);
    }

    static function forgotPassword() {}
}