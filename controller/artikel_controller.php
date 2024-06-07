<?php
include_once 'model/artikel_model.php';
class ArtikelController
{
    static function showListArtikel()
    {
        $artikel = Artikel::getAllArtikel();
        view('artikel/listartikel', ['artikel' => $artikel]);
    }
    static function detail($slug)
    {
        $artikel = Artikel::getArtikelBySlug($slug);
        if (!$artikel) {
            header('HTTP/1.0 404 Not Found');
            echo "Artikel tidak ditemukan.";
            exit;
        }
        return view('artikel/detailartikel', ['artikel' => $artikel]);
    }
    static function detailartikel($id)
    {
        $artikel = Artikel::getArtikelById($id);
        return view('artikel/detailartikel', ['artikel' => $artikel]);
    }
    static function showDetailArtikel()
    {
        if (isset($_GET['id'])) {
            $id_artikel = $_GET['id'];
            $artikel = Artikel::getArtikelById($id_artikel);
            view('artikel/detailartikel', ['url' => 'view/artikel/detailartikel', 'artikel' => $artikel]);
        }
    }
}
