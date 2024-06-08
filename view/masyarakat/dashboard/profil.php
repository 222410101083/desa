<?php
$user = $_SESSION['user'];
// var_dump($user);
?>
<div class="bg-white overflow-hidden shadow rounded-lg border mt-10 mx-10">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-9000">
            Profil Masyarakat
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
        </p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <!-- Tambahkan avatar di sini -->
            <div class="">
                <div class="sm:col-span-1 flex sm:justify-center mt-2 mb-2 object-cover">
                    <img class="object-cover h-24 w-24 rounded-full" src="<?= BASEURL . $user['avatar'] ?>"
                        alt="Foto Profil">
                </div>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Nama Lengkap
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <?= $user['name']; ?>
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Alamat Email
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <?= $user['email']; ?>
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Nomor HP
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <?= $user['nomor_hp']; ?>
                </dd>
            </div>
        </dl>
    </div>
    <div class="flex justify-center mb-2"><a href="profil/ubah"><button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ubah
                Profil</button></a></div>
</div>