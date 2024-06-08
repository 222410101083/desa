<div class="bg-white overflow-hidden shadow rounded-lg border mt-10 mx-10">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Ubah Profil Akun
        </h3>
    </div>
    <form action="<?= BASEURL . 'pemerintah/profil/edit?id=' . $user['id']; ?>" method="POST"
        enctype="multipart/form-data">
        <div class="">
            <div class="sm:col-span-1 flex sm:justify-center mt-2 mb-2 object-cover">
                <img id="avatarImage" class="object-cover h-24 w-24 rounded-full " src="<?= BASEURL.$user['avatar'] ?>" alt="Foto Profil">
            </div>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
            <dt class="text-sm font-medium text-gray-500">
                Foto Profil
            </dt>
            <dd class="mt-1 text-sm text-gray-900  sm:col-span-2">
                <input type="file" name="avatar" id="avatarInput"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm rounded-md">
            </dd>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3  sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                    <dt class="text-sm font-medium text-gray-500">
                        Nama Lengkap
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:col-span-2">
                        <input type="text" name="name" value="<?= $user['name']; ?>"
                            class="p-2 mt-1 border-2 h-10 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm rounded-md">
                    </dd>
                </div>
                <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                    <dt class="text-sm font-medium text-gray-500">
                        Alamat Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:col-span-2">
                        <input type="email" name="email" value="<?= $user['email']; ?>"
                            class="p-2 mt-1 border-2 h-10 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm rounded-md">
                    </dd>
                </div>
                <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                    <dt class="text-sm font-medium text-gray-500">
                        Nomor HP
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:col-span-2 items-center">
                        <input type="text" name="nomor_hp" value="<?= $user['nomor_hp']; ?>"
                            class="p-2 mt-1 border-2 h-10 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm rounded-md">
                    </dd>
                </div>
            </dl>
        </div>
        <div class="flex justify-center mb-2">
            <a href="#" onclick="history.back();"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">
                Simpan
            </button>
        </div>
    </form>
</div>
<?php
include 'view/master.php'; ?>

<script>
document.getElementById('avatarInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('avatarImage').src = e.target.result;
    };
    reader.readAsDataURL(file);
});
</script>
