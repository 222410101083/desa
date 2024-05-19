
<div class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto my-10 bg-white p-5 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Proposal</h2>
            <form action="<?= urlpath('add/saveAddProposal'); ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                    <input type="text" id="judul" name="judul" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File Proposal (PDF):</label>
                    <input type="file" id="file" name="file" accept=".pdf" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php include 'view/master.php'; ?>