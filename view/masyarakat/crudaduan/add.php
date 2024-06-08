<div class="bg-gray-100 h-screen w-full">
    <div class="mx-auto px-10 flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold text-gray-900 my-4">Tambah Aduan</h1>
        <div class="w-full max-w-lg">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST"
                action="<?= urlpath('masyarakat/aduan/add'); ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                        Judul
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="judul" name="judul" type="text" placeholder="Judul Aduan" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                        Deskripsi
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="deskripsi" name="deskripsi" placeholder="Deskripsi Aduan" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                        Kategori
                    </label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="kategori" name="kategori" required>
                        <option value="Infrastruktur">Infrastruktur</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Keamanan">Keamanan</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Sosial">Sosial</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Budaya">Budaya</option>
                        <option value="Pariwisata">Pariwisata</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="flex items-center justify-center gap-x-4">
                    <a href="#" onclick="history.back()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                        batal
                    </a>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Kirim Aduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'view/master.php'; ?>