<?php
// include_once("../model/artikel_model.php");
include_once 'model/artikel_model.php';

class ArtikelAdminController
{
    static function getAllArtikel()
    {
        $artikel = Artikel::getAllArtikel();
        view('admin/dashboard/layout', ['url' => 'artikel', 'artikel' => $artikel]);
    }

    static function addArtikel($judul, $konten, $gambar, $penulis)
    {
        Artikel::addArtikel($judul, $konten, $gambar, $penulis);
    }
    static function showAddArtikel()
    {
        view('admin/dashboard/layout', ['url' => 'view/admin/crudartikel/add', 'artikel' => 'addartikel']);
    }
    static function storeArtikel()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'] ?? '';
            $konten = $_POST['konten'] ?? '';
            $gambar = $_FILES['gambar']['name'] ?? '';
            $penulis = $_SESSION['user']['id'] ?? '';

            // Validasi input
            if (empty($judul) || empty($konten) || empty($gambar) || empty($penulis)) {
                view('admin/dashboard/layout', ['url' => 'view/admin/crudartikel/add', 'error' => 'Semua field harus diisi!']);
                return;
            }

            // Proses file gambar
            $target_dir = "src/thumbnail/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true); // Membuat direktori jika belum ada
            }
            $target_file = $target_dir . basename($gambar);

            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                // File berhasil diupload
                Artikel::addArtikel($judul, $konten, $target_file, $penulis);
                view('admin/dashboard/layout', ['url' => 'artikel', 'success' => 'Berhasil menambahkan artikel!']);
            } else {
                // Error upload file
                view('admin/dashboard/layout', ['url' => 'view/admin/crudartikel/add', 'error' => 'Gagal mengupload gambar!']);
                return;
            }
        }
    }
    static function showDetailArtikel()
    {
        if (isset($_GET['id'])) {
            $id_artikel = $_GET['id'];
            $artikel = Artikel::getArtikelById($id_artikel);
            view('component/detailartikel', ['url' => 'view/component/detailartikel', 'artikel' => $artikel]);
        }
    }
}

