<div class="flex w-full ">
    <a href="#" onclick="history.back();"
        class="mt-4 w-24 h-10 text-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-4">Kembali</a>
    <div class="flex mt-4 items-center justify-center">
        <div class="flex w-full flex-row bg-clip-border rounded-xl text-gray-700 shadow-md">
            <div class="m-0 w-3/4 bg-white bg-clip-border rounded-xl text-gray-700">
                <embed class="w-full h-[90vh]" src="<?= BASEURL . $proposal['file_path']; ?>"
                    type="application/pdf"></embed>
            </div>
            <div class="w-3/4 bg-gray-200 p-8">
                <!-- Container untuk judul, deskripsi, dan form ubah status -->
                <div class="bg-white p-8 rounded-lg shadow-xl">

                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-6">
                        <h1 class="block text-gray-700 text-xl font-bold mb-2">Edit Proposal</h1>
                        <form action="<?= urlpath('masyarakat/proposal/edit?id=' . $proposal['id_proposal']); ?>"
                            method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                                    Judul Proposal
                                </label>
                                <input value="<?= $proposal['judul'] ?>"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="judul" name="judul" type="text" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                                    Deskripsi
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="deskripsi" name="deskripsi" required><?= $proposal['deskripsi'] ?></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="file_patch">
                                    File Proposal (PDF)
                                </label>
                                <input type="file"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="file_patch" name="file_patch" accept=".pdf">
                            </div>

                            <div class="flex items-center justify-between">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Update Proposal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'view/master.php'; ?>