<?php 
include 'view/master.php'; ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-center my-6">Daftar Proposal</h1>
    <div class="overflow-x-auto">
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
            <?php $no = 1; ?>
            <?php foreach ($proposals as $proposal): ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-4"><?= $no++; ?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($proposal['judul']) ?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($proposal['deskripsi']) ?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($proposal['tanggal_pengajuan']) ?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($proposal['status']) ?></td>
                    <td class="py-3 px-4 flex justify-center items-center">
                        <a href="/pweb/<?= $proposal['file_path'] ?>" class="text-blue-500 hover:text-blue-700 ml-4"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</button></a>
                        <a href="edit.php?id=<?= $proposal['id_proposal'] ?>" class="text-green-500 hover:text-green-700 ml-4"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button></a>
                        <a href="delete.php" class="text-red-500 hover:text-red-700 ml-4"><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>     
            </tbody>
        </table>
    </div>
</div>
