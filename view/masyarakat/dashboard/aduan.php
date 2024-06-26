<?php include 'view/master.php'; ?>
<div class="container mx-auto px-4 mt-2">
    <h1 class="text-2xl font-bold text-gray-900 my-4">Daftar Aduan</h1>
    <div class="flex justify-between mt-2">
        <a href="<?= urlpath('masyarakat/aduan/add') ?>" class="bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 rounded mb-3 h-10">Buat Aduan
            Baru</a>
        <input type="text" id="searchInput" placeholder="Cari Aduan" class="mb-4 px-4 py-2 border rounded">
    </div>
    <div class="overflow-x-auto">
        <table class="w-[1230px] bg-white shadow-md rounded-lg text-sm">
            <thead class="bg-gray-800 text-white">
                <tr class="border-b border-gray-200">
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-left">Nomor</th>
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-left">Judul</th>
                    <th class=" w-1/5 py-3 px-4 uppercase font-semibold text-left"">Kategori</th>
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-left"">Tanggal</th>
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-left"">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                if (!is_array($aduans)) {
                    $aduans = []; // Inisialisasi sebagai array kosong jika bukan array
                }
                foreach ($aduans as $aduan): ?>
                
                    <tr class=" border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4""><?= $no++; ?></td>
                        <td class=" py-3 px-4""><?= $aduan['judul'] ?></td>
                        <td class=" py-3 px-4""><?= $aduan['kategori'] ?></td>
                        <td class="py-3 px-4""><?= $aduan['tanggal'] ?></td>
                        <td class="py-3 px-4"">
                            <a href="<?= urlpath('masyarakat/aduan/detail?id=' . $aduan['id_aduan']) ?>" class=" text-blue-500 hover:text-blue-700 text-center font-bold mb-3 h-10">Detail Aduan</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        var searchText = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?= urlpath("masyarakat/aduan/cari") ?>?query=' + searchText, true);
        console.log(xhr);
        xhr.onload = function () {
            if (this.status === 200) {
                document.querySelector('tbody').innerHTML = this.responseText;
            }
        }
        xhr.send();
    });
</script>