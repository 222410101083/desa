<?php

include_once 'model/aduan_model.php';

class AduanMasyakatController
{
    public static function getAduanByUserId()
    {
        $aduans = Aduan::getAduanByUserId($_SESSION['user']['id']);
        view('masyarakat/dashboard/layout', ['url' => 'view/masyarakat/dashboard/aduan', 'aduans' => $aduans]);
    }

    public static function viewAddAduan() //Menampilkan form untuk membuat aduan baru.
    {
        view('masyarakat/dashboard/layout', ['url' => 'view/masyarakat/crudaduan/add']);
    }

    public static function storeAduan()
    {
        $_POST['id_pengadu'] = $_SESSION['user']['id'];
        $_POST['nama_pengadu'] = $_SESSION['user']['name'];
        $_POST['tanggal'] = date('Y-m-d H:i:s');
        Aduan::addAduan($_POST);
        header('Location: ' . BASEURL . 'masyarakat/aduan');
    }
    public static function viewDetailAduan()
    {
        $id_aduan = $_GET['id'];
        $aduan = Aduan::getAduanById($id_aduan);
        view('masyarakat/dashboard/layout', ['url' => 'view/masyarakat/crudaduan/detailaduan', 'aduan' => $aduan]);
    }
    public static function viewAduanByKategori()
    {
        $kategori = $_GET['kategori'];
        $aduans = Aduan::getAduanCountByCategory();
    }

    public static function cariAduan()
    {
        $searchText = $_GET['query'] ?? '';
        $aduans = Aduan::getUserFilteredAduan($searchText, $_SESSION['user']['id']);
        $no = 1;
        foreach ($aduans as $aduan) {
            echo "<tr class='border-b border-gray-200'>";
            echo "<td class='py-3 px-4'>" . $no++ . "</td>";
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