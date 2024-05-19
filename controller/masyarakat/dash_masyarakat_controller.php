<?php

include_once 'model/proposal_model.php';

class DashboardMasyarakatController
{
    static function index()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            view('masyarakat/dashboard/layout', [
                'url' => 'home',
            ]);
        }
    }
    static function ListProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            // Ambil data akun pemerintah dari model
            $proposals = Proposal::getProposalsByUserId($_SESSION['user']['id']);
            view('masyarakat/dashboard/layout', [
                'url' => 'proposal',
                'proposals' => $proposals,
            ]);
        }
    }
    static function Proposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        // Menampilkan halaman tambah proposal
        view('masyarakat/dashboard/layout', [
            'url' => 'add',
        ]);
    }
    static function saveAddProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $tanggal_pengajuan = date('Y-m-d H:i:s'); // Mengambil tanggal dan waktu saat ini
            $status = 'Diajukan';
            $id_user = $_SESSION['user']['id'];

            // Handle file upload
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileType = $_FILES['file']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                // Cek apakah file adalah PDF
                if ($fileExtension == 'pdf') {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = './src/file/';
                    $dest_path = $uploadFileDir . $newFileName;
                    $dest_path = $uploadFileDir . $newFileName;
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        // Simpan data proposal ke database
                        Proposal::tambahProposal($judul, $deskripsi, $tanggal_pengajuan, $dest_path, $status, $id_user);
                        header('Location: ' . BASEURL . '/masyarakat/dashboard?upload=success');
                    } else {
                        header('Location: ' . BASEURL . '/masyarakat/dashboard?upload=error');
                    }
                } else {
                    header('Location: ' . BASEURL . '/masyarakat/dashboard?upload=error');
                }
            }
        } else {
            // Redirect back to the form if the request method is not POST
            header('Location: ' . BASEURL . '/masyarakat/dashboard?upload=error'); // Redirect back to the form if the request method is not POST

        }
    }
    // static function admin() {
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
    //         header('Location: '.BASEURL.'login?auth=false');
    //         exit;
    //     }
    //     else {
    //         view('masyarakat/layout', ['url' => 'admin', 'user' => $_SESSION['user']]);
    //     }
    // }

    // static function contacts() {
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
    //         header('Location: '.BASEURL.'login?auth=false');
    //         exit;
    //     }
    //     else {
    //         view('masyarakat/layout', ['url' => 'contacts', 'contacts' => Contact::rawQuery("SELECT c1.id as id,c1.phone_number as phone_number, c1.owner as owner, c2.city as city, c1.deleted_at as deleted_at, c1.user_fk as user_fk, c1.id as id FROM contacts as c1, cities as c2 WHERE c1.city_fk = c2.id ORDER BY id;"), 'user' => $_SESSION['user']]);
    //     }
    // }
}