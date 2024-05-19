<?php
include 'view/master.php'; 
// session_start();
// ob_start();
$style = ob_get_clean();
?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-center my-6">Daftar Proposal</h1>
    <a href="proposal/add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
        Proposal</a>
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-md rounded-lg text-sm">
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
                foreach ($proposals as $proposal): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4"><?= ($proposal['judul']) ?></td>
                        <td class="py-3 px-4"><?= ($proposal['deskripsi']) ?></td>
                        <td class="py-3 px-4"><?= ($proposal['tanggal_pengajuan']) ?></td>
                        <td class="py-3 px-4"><?= ($proposal['status']) ?></td>
                        <td class="py-3 px-4 flex justify-center items-center">
                            <a href="/pweb/<?= $proposal['file_path'] ?>" target="_blank"
                                class="text-blue-500 ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</a>
                            <a href="/pweb/masyarakat/proposal/edit?id=<?= $proposal['id_proposal'] ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">Edit</a>
                            <a href="<?= (urlpath("masyarakat/proposal/delete?id=" . $proposal['id_proposal'])); ?>"
                                class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-red-500 hover:text-white-700 ml-4">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>