<?php $body = ob_get_clean(); ?>
<?php include 'view/master.php'; ?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-left my-6">Daftar Artikel</h1>
    <div class="flex justify-between">
        <a href="artikel/add"><button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                Artikel</button></a>
        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Cari Artikel..."
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>
    <div class="overflow-x-auto mt-2">
        <table class="w-[1230px] bg-white shadow-md rounded-lg text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">No</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-left">Judul</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Penulis</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Gambar</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php
                $no = 1;
                foreach ($artikel as $artikel):
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4"><?= ($artikel['judul']) ?></td>
                        <td class="py-3 px-4"><?= ($artikel['name']) ?></td>
                        <td class="py-3 px-4"><?= ($artikel['gambar']) ?></td>
                        <td class="py-3 px-4 flex justify-center items-center">
                            <a href="<?= BASEURL . "admin/artikel/detail?id=" . $artikel['id_artikel'] ?>"
                                class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</a>
                            <a href="<?= BASEURL . "admin/artikel/edit?id=" . $artikel['id_artikel'] ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">Edit</a>
                            <a href="<?= BASEURL . "admin/artikel/delete?id=" . $artikel['id_artikel'] ?>"
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