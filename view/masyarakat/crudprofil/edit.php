<div class="bg-white overflow-hidden shadow rounded-lg border">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Ubah Profil Masyarakat
        </h3>
    </div>
    <form action="<?= BASEURL . 'masyarakat/profil/edit?id=' . $user['id']; ?>" method="POST"
        enctype="multipart/form-data">
        <div class="">
            <div class="sm:col-span-1 flex sm:justify-center mt-2 mb-2">
                <img class="h-24 w-24 rounded-full" src="<?= BASEURL.$user['avatar'] ?>" alt="Foto Profil">
            </div>
        </div>
        <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
                Foto Profil
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="file" name="avatar"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </dd>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nama Lengkap
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input type="text" name="name" value="<?= $user['name']; ?>"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Alamat Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input type="email" name="email" value="<?= $user['email']; ?>"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nomor HP
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input type="text" name="nomor_hp" value="<?= $user['nomor_hp']; ?>"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </dd>
                </div>
            </dl>
        </div>
        <div class="flex justify-center mb-2">
            <a href="#" onclick="history.back();"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?php
include 'view/master.php'; ?>