<?php
include 'view/master.php';
// session_start();
// ob_start();
// $style = ob_get_clean();
?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-left my-6">Daftar Proposal</h1>
    <div class="flex justify-between">
        <a href="proposal/add"><button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                Proposal</button></a>
        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Cari Proposal..."
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>
    <div class="overflow-x-auto mt-2">
        <table class="w-[1230px] bg-white shadow-md rounded-lg text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Nomor</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-left">Judul</th>
                    <th class="w-1/3 py-3 px-4 uppercase font-semibold text-left">Deskripsi</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Tanggal Pengajuan</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Status</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php
                $no = 1;
                if (is_array($proposals) && $proposals) {
                    $filteredProposals = array_filter($proposals, function ($proposal) {
                        return $proposal['id_user'] == $_SESSION['user']['id'];
                    });
                } else {
                    $filteredProposals = [];
                }

                foreach ($filteredProposals as $proposal):
                    $rowClass = ($proposal['status'] == 'Disetujui') ? 'bg-green-200 hover:bg-green-100' : '';
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 <?= $rowClass ?>">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($proposal['judul']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($proposal['deskripsi']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($proposal['tanggal_pengajuan']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($proposal['status']) ?></td>
                        <td class="py-3 px-4 flex justify-center items-center">
                            <a href="<?= BASEURL . $proposal['file_path'] ?>" target="_blank"
                                class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</a>
                            <a href="<?= BASEURL . "masyarakat/proposal/edit?id=" . $proposal['id_proposal'] ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">Edit</a>
                            <a href="<?= BASEURL . "masyarakat/proposal/delete?id=" . $proposal['id_proposal'] ?>"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hover:text-white-700 ml-4">Hapus</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>