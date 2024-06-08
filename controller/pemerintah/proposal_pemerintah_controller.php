<?php

include_once 'model/proposal_model.php';
class ProposalPemerintahController
{
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

    static function showUbahStatusProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if (isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $proposal = Proposal::getProposalById($id_proposal);
            $file_path = $proposal['file_path'];

            if ($proposal) {
                view('pemerintah/dashboard/layout', ['url' => 'view/pemerintah/crudproposal/ubahstatus', 'proposal' => $proposal]);
            } else {
                // header('Location: ' . BASEURL . 'pemerintah/proposal?error=notfound');
            }
        } else {
            // header('Location: ' . BASEURL . 'pemerintah/proposal?error=missingid');
        }
    }

    static function ubahStatusProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
            $id_proposal = $_POST['id'];
            $status_baru = $_POST['status'];

            // Cek keberadaan proposal
            $proposal = Proposal::getProposalById($id_proposal);
            if (!$proposal) {
                header('Location: ' . BASEURL . 'pemerintah/proposal?error=notfound');
                exit;
            }

            // Update status proposal
            Proposal::updateStatusProposal($id_proposal, $status_baru);
            header('Location: ' . BASEURL . 'pemerintah/proposal?status=success');
        } else {
            header('Location: ' . BASEURL . 'pemerintah/proposal?status=error');
        }
    }
    public static function getFilteredProposal()
    {
        $searchText = $_GET['query'] ?? '';
        $proposals = Proposal::getFilteredProposal($searchText);
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
            echo "<td class='py-3 px-4'>" . $proposal['deskripsi'] . "</td>";
            echo "<td class='py-3 px-4'>" . $proposal['tanggal_pengajuan'] . "</td>";
            echo "<td class='py-3 px-4'>" . $proposal['nama_pengaju'] . "</td>";
            echo "<td class='py-3 px-4'>" . $proposal['status'] . "</td>";
            echo "<td class='py-3 px-4 flex justify-center items-center'>";
            echo "<a href='" . BASEURL . $proposal['file_path'] . "' class='text-blue-500 hover:text-blue-700 ml-4'>";
            echo "<button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Lihat</button></a>";
            echo "<a href='" . BASEURL . "pemerintah/proposal/ubahstatus?id=" . $proposal['id_proposal'] . "' class='text-green-500 hover:text-green-700 ml-4'>";
            echo "<button class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded'>Aksi</button></a>";
            echo "</td>";
            echo "</tr>";
        }
    }
    static function showDetailProposal()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        }
        if (isset($_GET['id'])) {
            $id_proposal = $_GET['id'];
            $proposal = Proposal::getProposalById($id_proposal);
            view('pemerintah/dashboard/layout', ['url' => 'view/pemerintah/crudproposal/detailproposal', 'proposal' => $proposal]);
        }
    }
}

