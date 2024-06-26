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
    static function storeProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $tanggal_pengajuan = date('Y-m-d H:i:s'); // Mengambil tanggal dan waktu saat ini
            $status = 'ditinjau';
            $id_user = $_SESSION['user']['id'];
            $nama_pengaju = $_SESSION['user']['name'];

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
                        Proposal::tambahProposal($judul, $deskripsi, $tanggal_pengajuan, $dest_path, $status, $id_user, $nama_pengaju);
                        setFlashMessage('Berhasil', 'Berhasil menambahkan proposal');
                        header('Location: ' . BASEURL . 'masyarakat/proposal');
                    } else {
                        setFlashMessage('Gagal', 'Gagal menambahkan proposal');
                        header('Location: ' . BASEURL . 'masyarakat/proposal');
                    }
                } else {
                    setFlashMessage('Gagal', 'Gagal menambahkan proposal');
                    header('Location: ' . BASEURL . 'masyarakat/proposal');
                }
            }
        } else {
            // Redirect back to the form if the request method is not POST
            setFlashMessage('Gagal', 'Gagal menambahkan proposal');
            header('Location: ' . BASEURL . 'masyarakat/proposal'); // Redirect back to the form if the request method is not POST

        }
    }

    static function showEditProposal()
    {
        $id_proposal = $_GET['id'];
        $currentProposal = Proposal::getProposalById($id_proposal);
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            setFlashMessage('Gagal', 'Anda tidak memiliki akses ke halaman ini');
            header('Location: ' . BASEURL . 'login');
            exit;
        }

        if ($currentProposal['status'] === 'Disetujui') {
            setFlashMessage('Gagal', 'Proposal sudah disetujui');
            header('Location: ' . BASEURL . 'masyarakat/proposal');
            exit;
        }

        if (isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $proposal = Proposal::getProposalById($id_proposal);

            if ($proposal) {
                view('masyarakat/dashboard/layout', ['url' => 'view/masyarakat/crudproposal/edit', 'proposal' => $proposal]);
            } else {
                setFlashMessage('Gagal', 'Proposal tidak ditemukan');
                header('Location: ' . BASEURL . 'masyarakat/proposal');
            }
        } else {
            setFlashMessage('Gagal', 'Proposal tidak ditemukan');
            header('Location: ' . BASEURL . 'masyarakat/proposal');
        }
    }

    static function editProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $currentProposal = Proposal::getProposalById($id_proposal);

            // Cek jika proposal sudah disetujui
            if ($currentProposal['status'] === 'Disetujui') {
                setFlashMessage('Proposal', 'Proposal sudah disetujui tidak dapat diubah');
                header('Location: ' . BASEURL . 'masyarakat/proposal');
                exit;
            }

            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $tanggal_pengajuan = date('Y-m-d H:i:s');
            $status = 'ditinjau';
            $proposal = $_FILES['file_patch'];
            // $nama_pengaju = $_SESSION['user']['name'];

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
                        setFlashMessage('Berhasil', 'Berhasil mengubah proposal');
                        header('Location: ' . BASEURL . 'masyarakat/proposal');
                    } else {
                        setFlashMessage('Gagal', 'Gagal mengubah proposal');
                        header('Location: ' . BASEURL . 'masyarakat/proposal');
                    }
                } else {
                    setFlashMessage('Gagal', 'Gagal mengubah proposal');
                    header('Location: ' . BASEURL . 'masyarakat/proposal');
                }
            } else {
                // Jika tidak ada file baru yang diunggah, gunakan file yang sudah ada
                $proposal = $currentProposal['file_patch'];
                Proposal::updateProposal($id_proposal, $judul, $deskripsi, $tanggal_pengajuan, $currentProposal['file_path'], $status);
                if (isset($_GET['edit']) && $_GET['edit'] == 'success') {
                    // set_flash_message('Data berhasil disimpan.', 'success');
                }
                setFlashMessage('Berhasil', 'Berhasil mengubah proposal');
                header('Location: ' . BASEURL . 'masyarakat/proposal');
            }
        } else {
            setFlashMessage('Gagal', 'Gagal mengubah proposal');
            header('Location: ' . BASEURL . 'masyarakat/proposal');
        }
    }
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
                setFlashMessage('Gagal', 'Proposal sudah disetujui tidak dapat dihapus');
                header('Location: ' . BASEURL . 'masyarakat/proposal');
                exit;
            }

            Proposal::destroyProposal($id_proposal);
            setFlashMessage('Berhasil', 'Berhasil menghapus proposal');
            header('Location: ' . BASEURL . 'masyarakat/proposal');
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
            $status = 'ditinjau';
            $id_user = $_SESSION['user']['id'];
            $nama_pengaju = $_SESSION['user']['name'];

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
                        Proposal::tambahProposal($judul, $deskripsi, $tanggal_pengajuan, $dest_path, $status, $id_user, $nama_pengaju);
                        header('Location: ' . BASEURL . 'dashboard?upload=success');
                    } else {
                        setFlashMessage('Gagal', 'Gagal menambahkan proposal');
                        header('Location: ' . BASEURL . 'dashboard?upload=error');
                    }
                } else {
                    setFlashMessage('Gagal', 'Gagal menambahkan proposal');
                    header('Location: ' . BASEURL . 'dashboard?upload=invalidtype');
                }
            }
        } else {
            view('masyarakat/dashboard/tambah_proposal');
        }
    }
    static function showDetailProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'masyarakat') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        if (isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $proposal = Proposal::getProposalById($id_proposal);
            view('masyarakat/dashboard/layout', ['url' => 'view/masyarakat/crudproposal/detailproposal', 'proposal' => $proposal]);
        }
    }
    public static function getFilteredProposal()
    {
        $searchText = $_GET['query'] ?? '';
        $proposals = Proposal::getUserFilteredProposal($searchText, $_SESSION['user']['id']);
        $no = 1;
        foreach ($proposals as $proposal) {
            $statusClass = '';
            if ($proposal['status'] === 'Disetujui') {
                $statusClass = 'bg-green-100 hover:bg-green-200';
            } elseif ($proposal['status'] === 'Ditolak') {
                $statusClass = 'bg-red-100 hover:bg-red-200';
            } elseif ($proposal['status'] === 'Ditinjau') {
                $statusClass = 'bg-yellow-100 hover:bg-yellow-200';
            }
            echo "<tr class='border-b border-gray-200 $statusClass'>";
            echo "<td class='py-3 px-4'>" . $no++ . "</td>";
            echo "<td class='py-3 px-4'>" . $proposal['judul'] . "</td>";
            echo "<td class='py-3 px-4'>" . $proposal['tanggal_pengajuan'] . "</td>";
            echo "<td class='py-3 px-4'>" . $proposal['status'] . "</td>";
            echo "<td class='py-3 px-4 flex justify-center items-center'>";
            echo "<a href=" . BASEURL . "masyarakat/proposal/detail?id=" . $proposal['id_proposal'] . "
            class='ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Lihat</a>";
            echo "<a href=" . BASEURL . "masyarakat/proposal/edit?id=" . $proposal['id_proposal'] . "
            class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4'>Edit</a>";
            echo "<a href=" . BASEURL . "masyarakat/proposal/delete?id=" . $proposal['id_proposal'] . "
            class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hover:text-white-700 ml-4'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
    }

}

