<?php
include_once 'model/artikel_model.php';
class ArtikelController {
    static function showListArtikel()
    {
        $artikel = Artikel::getAllArtikel();
        view('artikel/listartikel', ['artikel' => $artikel]);
    }
}
