<?php
// include_once("../model/artikel_model.php");
include_once 'model/artikel_model.php';
class ArtikelAdminController
{
    static function getAllArtikel()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        $artikel = Artikel::getAllArtikel();
        view('admin/dashboard/layout', ['url' => 'artikel', 'artikel' => $artikel]);
    }

    static function addArtikel($judul, $konten, $gambar, $penulis)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        Artikel::addArtikel($judul, $konten, $gambar, $penulis);
    }
    static function showAddArtikel()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        view('admin/dashboard/layout', ['url' => 'view/admin/crudartikel/add', 'artikel' => 'addartikel']);
    }
    static function storeArtikel()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'] ?? '';
            $konten = $_POST['konten'] ?? '';
            $penulis = $_SESSION['user']['id'] ?? '';

            // Validasi input
            if (empty($judul) || empty($konten) || empty($penulis)) {
                setFlashMessage('Gagal', 'Semua field harus diisi!');
                header('Location: ' . BASEURL . 'admin/artikel?tambahartikel=true');
                return;
            }

            $gambar = $_FILES['gambar']['name'] ?? '';
            $target_file = '';

            // Proses file gambar jika ada file yang diunggah
            if (!empty($gambar)) {
                $target_dir = "src/thumbnail/";
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true); // Membuat direktori jika belum ada
                }
                $target_file = $target_dir . basename($gambar);

                if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    // Error upload file
                    setFlashMessage('Gagal', 'Gagal mengupload gambar!');
                    header('Location: ' . BASEURL . 'admin/artikel?tambahartikel=true');
                    return;
                }
            }

            // Menambahkan artikel dengan atau tanpa gambar
            Artikel::addArtikel($judul, $konten, $target_file, $penulis);
            setFlashMessage('Berhasil', 'Berhasil menambahkan artikel!');
            header('Location: ' . BASEURL . 'admin/artikel?tambahartikel=true');
            return;
        }
    }
    static function showDetailArtikel()
    {
        if (isset($_GET['id'])) {
            $id_artikel = $_GET['id'];
            $artikel = Artikel::getArtikelById($id_artikel);
            view('component/detailartikel', ['url' => 'view/artikel/detailartikel', 'artikel' => $artikel]);
        }
    }
    static function showEditArtikel()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['id'])) {
                $id_artikel = $_GET['id'];
            $artikel = Artikel::getArtikelById($id_artikel);
                view('admin/dashboard/layout', ['url' => 'view/admin/crudartikel/edit', 'artikel' => $artikel]);
            }
        }
    }
    static function updateArtikel()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_artikel = $_GET['id'] ?? '';
            $judul = $_POST['judul'] ?? '';
            $konten = $_POST['konten'] ?? '';
            $penulis = $_SESSION['user']['id'] ?? '';

            // Mengambil data artikel saat ini untuk mendapatkan gambar yang ada
            $artikelSaatIni = Artikel::getArtikelById($id_artikel);
            $gambarSaatIni = $artikelSaatIni['gambar'] ?? '';

            $gambar = $_FILES['gambar']['name'] ?? '';
            $target_file = $gambarSaatIni; // Default ke gambar saat ini

            if (!empty($gambar)) {
                $target_dir = "src/thumbnail/";
                $target_file = $target_dir . basename($gambar);
                if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    setFlashMessage('Gagal', 'Gagal mengupload gambar!');
                    header('Location: ' . BASEURL . 'admin/artikel?editartikel=true');
                    return;
                }
            }

            $result = Artikel::updateArtikel($id_artikel, $judul, $konten, $target_file, $penulis);
            if ($result === true) {
                setFlashMessage('Berhasil', 'Artikel berhasil diperbarui!');
                header('Location: ' . BASEURL . 'admin/artikel');
            } else {
                setFlashMessage('Gagal', $result); // Menampilkan pesan error dari model
                header('Location: ' . BASEURL . 'admin/artikel?editartikel=true');
            }
        }
    }
    static function deleteArtikel()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        if (isset($_GET['id'])) {
            $id_artikel = $_GET['id'];
            Artikel::deleteArtikel($id_artikel);
            setFlashMessage('Berhasil', 'Berhasil menghapus artikel!');
            header('Location: ' . BASEURL . 'admin/artikel');
            return;
        }
    }
    public function detail()
    {
        $id = $_GET['id'];
        $artikel = Artikel::getArtikelById($id);
        if (!$artikel) {
            // Handle artikel tidak ditemukan
            header('Location: /error');
            exit;
        }
        return view('admin/dashboard/artikel', ['artikel' => $artikel]);
    }
}
