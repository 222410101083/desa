<?php include 'view/master.php'; ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-900 my-4">Daftar Aduan</h1>
    <input type="text" id="searchInput" placeholder="Cari Aduan" class="mb-4 px-4 py-2 border rounded">
    <!-- <a href="aduan/add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buat Aduan Baru</a> -->
    <table class="h-screen table-auto w-full mt-4 mb-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nomor</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($aduans as $aduan): ?>
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-3"><?= $no++; ?></td>
                    <td class="px-4 py-3"><?= $aduan['nama_pengadu'] ?></td>
                    <td class="px-4 py-3"><?= $aduan['judul'] ?></td>
                    <td class="px-4 py-3"><?= $aduan['kategori'] ?></td>
                    <td class="px-4 py-3"><?= $aduan['tanggal'] ?></td>
                    <td class="px-4 py-3"><a href="<?=urlpath("pemerintah/aduan/detail")?>?id=<?=$aduan['id_aduan']?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Detail</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    var searchText = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?=urlpath("pemerintah/aduan/cari")?>?query=' + searchText, true);
    console.log(xhr);
    xhr.onload = function() {
        if (this.status === 200) {
            document.querySelector('tbody').innerHTML = this.responseText;
        }
    }
    xhr.send();
});
</script>

