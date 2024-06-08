<?php

include_once 'model/aduan_model.php';

class AduanPemerintahController
{
    static function getAllAduan()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            // Ambil data akun pemerintah dari model
            $aduan = Aduan::getAllAduan();
            view('pemerintah/dashboard/layout', [
                'url' => 'aduan',
                'aduan' => $aduan,
            ]);
        }
    }
    public static function cariAduan()
    {
        $searchText = $_GET['query'] ?? '';
        $aduans = Aduan::cariAduan($searchText);
        $no = 1;
        foreach ($aduans as $aduan) {
            echo "<tr class='border-b border-gray-200'>";
            echo "<td class='py-3 px-4'>" . $no++ . "</td>";
            echo "<td class='py-3 px-4'>" . $aduan['nama_pengadu'] . "</td>";
            echo "<td class='py-3 px-4'>" . $aduan['judul'] . "</td>";
            echo "<td class='py-3 px-4'>" . $aduan['deskripsi'] . "</td>";
            echo "<td class='py-3 px-4'>" . $aduan['kategori'] . "</td>";
            echo "<td class='py-3 px-4'>" . $aduan['tanggal'] . "</td>";
            echo "<td class='py-3 px-4 flex justify-center items-center'>";
            echo "</td>";
            echo "</tr>";
        }
    }
}

