
<?php include 'view/master.php'; ?>
<div class="bg-gray-100 h-screen w-full">
    <div class="mx-auto px-4 mt-2 w-full">
        <div class="flex justify-center items-center mx-10">
            <div class="bg-white shadow-md rounded w-1/2 px-8 pt-6 pb-8 mb-4 mt-4">
                <h5 class="text-lg font-bold mb-6">Tambah Akun Pemerintah</h5>
                <form action="<?= urlpath('tambahakun/tambahakunpemerintah'); ?>" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" required>
                    </div>
                    <div class="mb-4 hidden">
                        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                        <select name="role"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                            id="role">
                            <option value="pemerintah">Pemerintah</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah
                        Akun</button>
                </form>
            </div>
        </div>
    </div>