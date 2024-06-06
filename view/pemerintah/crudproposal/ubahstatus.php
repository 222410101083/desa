<?php
include 'view/master.php'; ?>

<div class="flex w-full ">
    <a href="#" onclick="history.back();"
        class="mt-4 w-24 h-10 text-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">Kembali</a>
    <div class="flex mt-4 items-center justify-center w-full">
        <div class="flex w-full flex-row bg-clip-border rounded-xl text-gray-700 shadow-md">
            <div class="m-0 w-3/4 bg-white bg-clip-border rounded-xl text-gray-700">
                <embed class="w-full h-[90vh]" src="<?= BASEURL . $proposal['file_path']; ?>"
                    type="application/pdf"></embed>
            </div>
            <div class="w-1/2 bg-gray-200 p-8">
                <!-- Container untuk judul, deskripsi, dan form ubah status -->
                <div class="bg-white p-8 rounded-lg shadow-xl">
                    <h1 class="text-2xl font-bold mb-4"><?= $proposal['judul']; ?></h1>
                    <p class="mb-4"><?= $proposal['deskripsi']; ?></p>

                    <form action="<?= urlpath('pemerintah/proposal/ubahstatus?id=' . $proposal['id_proposal']); ?>"
                        method="POST">
                        <input type="hidden" name="id" value="<?= $proposal['id_proposal']; ?>">

                        <label for="status" class="block text-sm font-medium text-gray-700">Status Baru</label>
                        <select id="status" name="status"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Ditinjau">Ditinjau</option>
                        </select>

                        <button type="submit"
                            class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ubah Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>