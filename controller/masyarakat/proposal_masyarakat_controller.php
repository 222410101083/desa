<?php

include_once 'model/proposal_model.php';
class ProposalMasyarakatController
{
    static function addProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        // Menampilkan halaman tambah proposal
        view('masyarakat/dashboard/layout', ['url' => 'view/masyarakat/crudproposal/add']);
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

    static function tambahProposal()
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
                    $uploadFileDir = './uploaded_files/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        // Simpan data proposal ke database
                        Proposal::tambahProposal($judul, $deskripsi, $tanggal_pengajuan, $dest_path, $status, $id_user);
                        header('Location: ' . BASEURL . 'dashboard?upload=success');
                    } else {
                        header('Location: ' . BASEURL . 'dashboard?upload=error');
                    }
                } else {
                    header('Location: ' . BASEURL . 'dashboard?upload=invalidtype');
                }
            }
        } else {
            view('masyarakat/dashboard/tambah_proposal');
        }
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
}