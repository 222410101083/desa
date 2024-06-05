<?php
include 'view/master.php'; ?>
<div class="w-full mx-auto px-4">
    <h1 class="text-2xl font-bold text-center my-6">Daftar Proposal</h1>
    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Cari Proposal..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="w-full">
        <table class="min-w-full bg-white shadow-md rounded-lg text-sm">
            <thead class="bg-gray-800 text-white">
                <tr class="w-fu">
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Nomor</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-left">Judul</th>
                    <th class="w-1/3 py-3 px-4 uppercase font-semibold text-left">Deskripsi</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Tanggal Pengajuan</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Pengaju</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Status</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $no = 1; ?>
                <?php foreach ($proposals as $proposal):
                    $statusClass = '';
                    if ($proposal['status'] === 'Disetujui') {
                        $statusClass = 'bg-green-100 hover:bg-green-200';
                    } elseif ($proposal['status'] === 'Ditolak') {
                        $statusClass = 'bg-red-100 hover:bg-red-200';
                    } elseif ($proposal['status'] === 'Ditinjau') {
                        $statusClass = 'bg-yellow-100 hover:bg-yellow-200';
                    }
                    ?>
                    <tr class="border-b border-gray-200 <?= $statusClass ?>">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4"><?=$proposal['judul'] ?></td>
                        <td class="py-3 px-4"><?=$proposal['deskripsi'] ?></td>
                        <td class="py-3 px-4"><?=$proposal['tanggal_pengajuan'] ?></td>
                        <td class="py-3 px-4"><?=$proposal['nama_pengaju'] ?></td>
                        <td class="py-3 px-4"><?=$proposal['status'] ?></td>
                        <td class="py-3 px-4 flex justify-center items-center">
                            <a href="<?= BASEURL . $proposal['file_path'] ?>"
                                class="text-blue-500 hover:text-blue-700 ml-4"><button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</button></a>
                            <a href="<?=urlpath("pemerintah/proposal/ubahstatus?id=" . $proposal['id_proposal']); ?>"
                                class="text-green-500 hover:text-green-700 ml-4"><button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Aksi</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    var searchText = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=urlpath("pemerintah/proposal/cari")?>?query=' + searchText, true);
    console.log(xhr);
    xhr.onload = function() {
        if (this.status === 200) {
            document.querySelector('tbody').innerHTML = this.responseText;
        }
    }
    xhr.send();
});
</script>
