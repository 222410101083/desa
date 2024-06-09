<?php
include_once 'model/user_model.php';
class ubahPassword
{
    private static $userModel;

    public static function init() {
        self::$userModel = new User();
    }

    public static function viewUbahPassword()
    {
        // view('admin/dashboard/pemerintah/ubahpassword');
        $user = $_SESSION();
        view('admin/dashboard/layout', ['url' => 'ubahpassword', 'user' => $user]);
    }
    public static function ubahPasswordPemerintah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['id'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                // Handle error jika password tidak sama
                setFlashMessage('Password tidak cocok.', 'error');
                header('Location: ' . BASEURL . 'admin/pemerintah');
                return;
            }

            // Panggil model untuk update password
            self::$userModel->updatePassword($userId, password_hash($password, PASSWORD_DEFAULT));
            setFlashMessage('Password berhasil diubah.', 'success');
            header('Location: ' . BASEURL . 'admin/pemerintah');
        }
    }
    public static function ubahPasswordMasyarakat()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['id'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                // Handle error jika password tidak sama
                setFlashMessage('Password tidak cocok.', 'Password harus sama');
                header('Location: ' . BASEURL . 'admin/masyarakat');
                return;
            }

            // Panggil model untuk update password
            self::$userModel->updatePassword($userId, password_hash($password, PASSWORD_DEFAULT));
            setFlashMessage('Password berhasil diubah.', 'success');
            header('Location: ' . BASEURL . 'admin/masyarakat');
        }
    }
}
