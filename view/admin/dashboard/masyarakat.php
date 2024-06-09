<div class="container mt-10 mx-10 min-h-max min-w-full">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Daftar Akun Masyarakat</h1>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Nama</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        No HP</th>
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
                            <div class="text-sm leading-5 text-blue-900"><?= $user['nomor_hp'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900"><?= $user['role'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            <button data-modal-target="modal-password-<?= $user['id'] ?>"
                                data-modal-toggle="modal-password-<?= $user['id'] ?>"
                                class="text-blue-600 hover:text-blue-900 text-sm  text-center" type="button">
                                Ubah
                            </button>
                            <!-- Main modal -->
                            <div id="modal-password-<?= $user['id'] ?>" tabindex="-1" aria-hidden="true"
                                class="flex hidden fixed inset-0 z-50 items-center justify-center w-full h-full">
                                <div class="relative p-4 w-full max-w-md h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-700 rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b border-gray-600">
                                            <h3 class="text-xl font-semibold text-white">
                                                Ubah Password
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:text-white"
                                                data-modal-hide="modal-password-<?= $user['id'] ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal Content -->
                                        <form class="max-w-sm mx-auto" action="<?= BASEURL ?>admin/masyarakat"
                                            method="post">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                                            <div class="mb-5">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                <div
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                    <?= $user['email'] ?>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="password"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                    Baru</label>
                                                <input type="password" name="password" id="password"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    required />
                                            </div>
                                            <div class="mb-5">
                                                <label for="confirm_password"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                                    Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    required />
                                            </div>
                                            <button data-modal-hide="modal-password-<?= $user['id'] ?>" type="button"
                                                class="mb-4 py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg hover:bg-red-300  focus:z-10 focus:ring-4 focus:ring-red-100 ">Batal</button>
                                            <button type="submit"
                                                class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Ubah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggleModalButtons = document.querySelectorAll('[data-modal-toggle]');
        toggleModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('data-modal-target');
                var modal = document.getElementById(target);
                if (modal.classList.contains('hidden')) {
                    modal.classList.remove('hidden');
                } else {
                    modal.classList.add('hidden');
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var closeModalButtons = document.querySelectorAll('[data-modal-hide]');
        closeModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('data-modal-hide');
                var modal = document.getElementById(target);
                modal.classList.add('hidden');
            });
        });
    });
</script>
<?php include 'view/master.php'; ?>