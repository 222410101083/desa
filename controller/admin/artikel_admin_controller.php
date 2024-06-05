<?php
// include_once("../model/artikel_model.php");
include_once 'model/artikel_model.php';

class ArtikelController {
    static function getAllArtikel() {
        $artikels = Artikel::getAllArtikel();
        view('admin/dashboard/layout', ['url' => 'artikel', 'artikels' => $artikels]);
    }

    static function addArtikel($judul, $gambar, $isi, $penulis) {
        Artikel::addArtikel($judul, $gambar, $isi, $penulis);
    }

    static function updateArtikel($id, $judul, $gambar, $isi, $penulis) {
        Artikel::updateArtikel($id, $judul, $gambar, $isi, $penulis);
    }
}