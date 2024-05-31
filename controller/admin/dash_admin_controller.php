<?php
include_once 'model/user_model.php';

class AdminController
{
    public static function Dashboard()
    {
        // Cek apakah pengguna telah login dan memiliki peran admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        // Tampilkan dashboard admin
        // view('auth_page/layout', ['url' => 'login']);
        view('admin/dashboard/layout', [
            'url' => 'home',
        ]);
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

        $user = User::register([
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'role' => $post['role']
            
        ]);

        if ($user) {
            header('Location: ' . BASEURL . 'admin/pemerintah?tambahakun=true');
        } else {
            header('Location: ' . BASEURL . 'admin/pemerintah?tambahakun=false');
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
    static function remove() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $id = $_GET['id'];
            $user = User::deleteUser($id);
            if ($user) {
                header('Location: '.BASEURL.'admin/pemerintah');
            }
            else {
                header('Location: '.BASEURL.'admin/pemerintah?removeFailed=true');
            }
        }
    }

}
