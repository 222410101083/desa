<?php include 'view/master.php'; ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-900 my-4">Daftar Aduan</h1>
    <a href="aduan/add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Buat Aduan
        Baru</a>
    <div class="overflow-x-auto mt-2">
        <table class="w-[1230px] bg-white shadow-md rounded-lg text-sm">
            <thead class="bg-gray-800 text-white">
                <tr class="border-b border-gray-200">
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Nomor</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Judul</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left"">Deskripsi</th>
                    <th class=" w-1/6 py-3 px-4 uppercase font-semibold text-left"">Kategori</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left"">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($aduans as $aduan): ?>
                    <tr class=" border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4""><?= $no++; ?></td>
                        <td class=" py-3 px-4""><?= htmlspecialchars($aduan['judul']) ?></td>
                        <td class="py-3 px-4""><?= htmlspecialchars($aduan['deskripsi']) ?></td>
                        <td class=" py-3 px-4""><?= htmlspecialchars($aduan['kategori']) ?></td>
                        <td class="py-3 px-4""><?= htmlspecialchars($aduan['tanggal']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>