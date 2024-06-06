<div class="container mt-10 mx-10 min-h-max min-w-full">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Daftar Akun Pemerintah</h1>
    </div>
    <a href="tambahakun" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Akun Pemerintah</a>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Nama</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Role</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900"><?= $user['name'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900"><?= $user['email'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900"><?= $user['role'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'view/master.php'; ?>