<?php include 'view/master.php'; ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-900 my-4">Daftar Aduan</h1>
    <!-- <a href="aduan/add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buat Aduan Baru</a> -->
    <table class="table-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nomor</th>
                <th class="px-4 py-2">Nama</th> <!-- Kolom baru untuk nama -->
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($aduans as $aduan): ?>
            <tr class="text-center">
                <td class="border px-4 py-2"><?= $no++; ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($aduan['nama_pengadu']) ?></td> <!-- Menggunakan kunci 'nama_pengadu' -->
                <td class="border px-4 py-2"><?= htmlspecialchars($aduan['judul']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($aduan['deskripsi']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($aduan['kategori']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($aduan['tanggal']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    </table>