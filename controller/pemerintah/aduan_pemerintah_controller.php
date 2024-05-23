<?php

include_once 'model/aduan_model.php';

class AduanPemerintahController
{
    public static function index()
    {
        // Pastikan pengguna sudah login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        $aduans = Aduan::select(); // Memanggil model untuk mendapatkan aduan

        // Menampilkan view dengan aduan yang diperoleh
        view('pemerintah/dashboard/layout', ['url' => 'aduan', 'aduans' => $aduans]);
    }

    public static function create() //Menampilkan form untuk membuat aduan baru.
    {
        view('pemerintah/dashboard/layout', ['url' => 'view/pemerintah/crudaduan/add']);
    }

    public static function store() // Menyimpan aduan baru ke database.
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Pastikan pengguna sudah login
            if (!isset($_SESSION['user'])) {
                header('Location: ' . BASEURL . 'login?auth=false');
                exit;
            }

            // Membersihkan data dari input untuk mencegah XSS
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Aduan::insert([
                'id_pengadu' => $_SESSION['user']['id'],
                'judul' => $post['judul'],
                'deskripsi' => $post['deskripsi'],
                'kategori' => $post['kategori'],
                'tanggal' => date('Y-m-d H:i:s') // Menambahkan tanggal saat ini
            ]);
            // Menyiapkan data untuk disimpan ke database

            // Memanggil model untuk menyimpan data
            if ($contact) {
                header('Location: ' . BASEURL . 'masyarakat/aduan?status=success');
            } else {
                header('Location: ' . BASEURL . 'masyarakat/aduan?status=error');
            }
        }
    }

    public function edit($id) // Menampilkan form untuk mengedit aduan.
    {
        $aduan = Aduan::select($id);
        view('aduan/edit', ['aduan' => $aduan]);
    }

    public function update($id) //Memperbarui aduan di database.
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_aduan' => $id,
                'id_pengadu' => $_SESSION['user']['id'],
                'judul' => $_POST['judul'],
                'deskripsi' => $_POST['deskripsi'],
                'kategori' => $_POST['kategori']
            ];

            if (Aduan::update($data)) {
                header('Location: ' . BASEURL . 'aduan/index?status=updated');
            } else {
                header('Location: ' . BASEURL . 'aduan/edit/' . $id . '?status=error');
            }
        }
    }

    public function destroy($id) //Menghapus aduan dari database.
    {
        if (Aduan::delete($id)) {
            header('Location: ' . BASEURL . 'aduan/index?status=deleted');
        } else {
            header('Location: ' . BASEURL . 'aduan/index?status=error');
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
            // echo "<a href='/pweb/" . $aduan['file_path'] . "' class='text-blue-500 hover:text-blue-700 ml-4'>";
            // echo "<button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Lihat</button></a>";
            // echo "<a href='" . urlpath("pemerintah/proposal/ubahstatus?id=" . $aduan['id_proposal']) . "' class='text-green-500 hover:text-green-700 ml-4'>";
            // echo "<button class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded'>Aksi</button></a>";
            echo "</td>";
            echo "</tr>";
        }
    }
}

