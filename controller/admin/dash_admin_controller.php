<?php
include_once 'model/user_model.php';

class AdminController
{
    static function Dashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $artikel = Artikel::getArtikelByPage($limit, $page);
        $totalArtikel = Artikel::getTotalArtikel();
        $totalPages = ceil($totalArtikel / $limit);
        view('admin/dashboard/layout', ['url' => 'home', 'artikel' => $artikel, 'totalPages' => $totalPages, 'currentPage' => $page]);
    }
    // public static function Dashboard()
    // {
    //     // Cek apakah pengguna telah login dan memiliki peran admin
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    //         header('Location: ' . BASEURL . 'login?auth=false');
    //         exit;
    //     }

    //     // Tampilkan dashboard admin
    //     // view('auth_page/layout', ['url' => 'login']);
    //     view('admin/dashboard/layout', [
    //         'url' => 'home',
    //     ]);
    // }
    static function profil()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } elseif ($_SESSION['user']['role'] !== 'admin') {
            // Arahkan ke dashboard berdasarkan role
            if ($_SESSION['user']['role'] == 'admin') {
                header('Location: ' . BASEURL . 'admin/dashboard');
            } elseif ($_SESSION['user']['role'] == 'pemerintah') {
                header('Location: ' . BASEURL . 'pemerintah/dashboard');
            } else {
                header('Location: ' . BASEURL . 'login?auth=false');
            }
            exit;
        } else {
            view('admin/dashboard/layout', ['url' => 'profil', 'user' => $_SESSION['user']]);
        }
    }
    static function TambahAkunPemerintah()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            view('admin/dashboard/layout', [
                'url' => 'tambahakun',
                'user' => $_SESSION['user']['role'] !== 'admin'
            ]);
        }
    }

    static function saveTambahAkunPemerintah()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        $post = array_map('htmlspecialchars', $_POST);
        $response = User::register([
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'role' => $post['role']
        ]);

        if ($response === true) {
            setFlashMessage('success', 'Akun pemerintah berhasil dibuat');
            header('Location: ' . BASEURL . 'admin/pemerintah?tambahakun=true');
        } else if ($response === 'Email sudah terdaftar') {
            setFlashMessage('error', 'Email sudah terdaftar');
            header('Location: ' . BASEURL . 'admin/tambahakun?tambahakun=false&error=email');
        } else {
            setFlashMessage('error', 'Akun pemerintah gagal dibuat');
            header('Location: ' . BASEURL . 'admin/tambahakun?tambahakun=false');
        }
    }
    public static function ListAkunPemerintah()
    {
        // Cek apakah pengguna telah login dan memiliki peran admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        // Ambil data akun pemerintah dari model
        $users = User::getUsersByRole('pemerintah');

        // Tampilkan view dengan data akun pemerintah
        view('admin/dashboard/layout', [
            'users' => $users,
            'url' => 'pemerintah',
            'user' => $_SESSION['user']['role'] !== 'admin'
        ]);
    }
    static function remove()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id = $_GET['id'];
            $user = User::deleteUser($id);
            if ($user) {
                header('Location: ' . BASEURL . 'admin/pemerintah');
            } else {
                header('Location: ' . BASEURL . 'admin/pemerintah?removeFailed=true');
            }
        }
    }

}
