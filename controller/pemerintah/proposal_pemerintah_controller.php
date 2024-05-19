<?php

include_once 'model/proposal_model.php';
class ProposalPemerintahController
{
    static function ListProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            // Ambil data akun pemerintah dari model
            $proposals = Proposal::getProposalsByUserId($_SESSION['user']['id']);
            view('pemerintah/dashboard/layout', [
                'url' => 'proposal',
                'proposals' => $proposals,
            ]);
        }
    }
    
    static function storeProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
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
                        header('Location: ' . BASEURL . '/pemerintah/proposal?upload=success');
                    } else {
                        header('Location: ' . BASEURL . '/pemerintah/proposal?upload=error');
                    }
                } else {
                    header('Location: ' . BASEURL . '/pemerintah/proposal?upload=error');
                }
            }
        } else {
            // Redirect back to the form if the request method is not POST
            header('Location: ' . BASEURL . '/pemerintah/proposal?upload=error'); // Redirect back to the form if the request method is not POST

        }
    }

    static function showEditProposal()
    {
        $id_proposal = $_GET['id'];
        $currentProposal = Proposal::getProposalById($id_proposal);
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if ($currentProposal['status'] === 'Disetujui') {
            header('Location: ' . BASEURL . 'pemerintah/proposal?edit=denied');
            exit;
        }

        if (isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $proposal = Proposal::getProposalById($id_proposal);

            if ($proposal) {
                view('pemerintah/dashboard/layout', ['url' => 'view/pemerintah/crudproposal/edit', 'proposal' => $proposal]);
            } else {
                header('Location: ' . BASEURL . 'pemerintah/proposal?error=notfound');
            }
        } else {
            header('Location: ' . BASEURL . 'pemerintah/proposal?error=missingid');
        }
    }

    static function editProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $currentProposal = Proposal::getProposalById($id_proposal);

            // Cek jika proposal sudah disetujui
            if ($currentProposal['status'] === 'Disetujui') {
                header('Location: ' . BASEURL . 'pemerintah/proposal?edit=denied');
                exit;
            }

            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $tanggal_pengajuan = date('Y-m-d H:i:s');
            $status = 'Diajukan';
            $proposal = $_FILES['file_patch'];

            // Handle file upload jika ada perubahan file
            if (isset($proposal['name']) && $proposal['error'] == 0) {
                $fileTmpPath = $proposal['tmp_name'];
                $fileName = $proposal['name'];
                $fileSize = $proposal['size'];
                $fileType = $proposal['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                if ($fileExtension == 'pdf') {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = './src/file/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        Proposal::updateProposal($id_proposal, $judul, $deskripsi, $tanggal_pengajuan, $dest_path, $status);
                        header('Location: ' . BASEURL . 'pemerintah/proposal?edit=success');
                    } else {
                        header('Location: ' . BASEURL . 'pemerintah/proposal?edit=error');
                    }
                } else {
                    header('Location: ' . BASEURL . 'pemerintah/proposal?edit=invalidtype');
                }
            } else {
                // Jika tidak ada file baru yang diunggah, gunakan file yang sudah ada
                Proposal::updateProposal($id_proposal, $judul, $deskripsi, $tanggal_pengajuan, $currentProposal['file_path'], $status);
                header('Location: ' . BASEURL . 'pemerintah/proposal?edit=success');
            }
        } else {
            header('Location: ' . BASEURL . 'pemerintah/proposal?edit=error');
        }
    }

    // static function editProposal()
    // {
    //     // echo $_GET['id'];
    //     // var_dump($_FILES['file_patch']);
    //     // die();
    //     // die();
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
    //         header('Location: ' . BASEURL . 'login?auth=false');
    //         exit;
    //     }

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {


    //         $id_proposal = $_GET['id'];
    //         $judul = $_POST['judul'];
    //         $deskripsi = $_POST['deskripsi'];
    //         $tanggal_pengajuan = date('Y-m-d H:i:s');
    //         $status = 'Diajukan';
    //         $proposal = $_FILES['file_patch'];

    //         // Ambil data proposal saat ini untuk mendapatkan path file yang ada
    //         $currentProposal = Proposal::getProposalById($id_proposal);

    //         // Handle file upload jika ada perubahan file
    //         if (isset($proposal['name']) && $proposal['error'] == 0) {
    //             $fileTmpPath = $proposal['tmp_name'];
    //             $fileName = $proposal['name'];
    //             $fileSize = $proposal['size'];
    //             $fileType = $proposal['type'];
    //             $fileNameCmps = explode(".", $fileName);
    //             $fileExtension = strtolower(end($fileNameCmps));

    //             if ($fileExtension == 'pdf') {
    //                 $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    //                 $uploadFileDir = './src/file/';
    //                 $dest_path = $uploadFileDir . $newFileName;

    //                 if (move_uploaded_file($fileTmpPath, $dest_path)) {
    //                     Proposal::updateProposal($id_proposal, $judul, $deskripsi, $tanggal_pengajuan, $dest_path, $status);
    //                     header('Location: ' . BASEURL . 'pemerintah/proposal?edit=success');
    //                 } else {
    //                     header('Location: ' . BASEURL . 'pemerintah/proposal?edit=error');
    //                 }
    //             } else {
    //                 header('Location: ' . BASEURL . 'pemerintah/proposal?edit=invalidtype');
    //             }
    //         } else {
    //             // Jika tidak ada file baru yang diunggah, gunakan file yang sudah ada
    //             Proposal::updateProposal($id_proposal, $judul, $deskripsi, $tanggal_pengajuan, $currentProposal['file_path'], $status);
    //             header('Location: ' . BASEURL . 'pemerintah/proposal?edit=success');
    //         }
    //     } else {
    //         header('Location: ' . BASEURL . 'pemerintah/proposal?edit=error');
    //     }
    // }

    static function removeProposal()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $id_proposal = $_GET['id'];
            $proposal = Proposal::getProposalById($id_proposal);

            // Cek jika proposal sudah disetujui
            if ($proposal['status'] === 'Disetujui') {
                header('Location: ' . BASEURL . 'pemerintah/proposal?delete=denied');
                exit;
            }

            Proposal::destroyProposal($id_proposal);
            header('Location: ' . BASEURL . 'pemerintah/proposal?delete=success');
        }
    }
}

