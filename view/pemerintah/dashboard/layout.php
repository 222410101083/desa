<?php
$title = 'Dashboard';
$user = $_SESSION['user'];
?>
<div class="flex flex-warp w-full justify-beetwen">
    <div class="bg-gradient-to-br from-[#4F46E5] to-[#4F46E5] ">
        <aside
            class=" min-h-screen top-0 left-0 pt-4 lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75 bg-gradient-to-br from-[#4F46E5] to-[#4F46E5] -translate-x-80 inset-0 rounded-xl transition-transform xl:translate-x-0">
            <div class=" flex justify-center border-blue-200">
                <div class=" flex justify-center mt-2 mb-2 rounded-full w-24 h-24 object-cover border-2 border-white">
                    <img class="w-24 object-cover rounded-full" src="<?= BASEURL . $user['avatar'] ?>" alt="Foto Profil">
                </div>
            </div>
            <div class="m-4">
                <ul class="mb-4 flex flex-col gap-1">
                    <li>
                        <a aria-current="page" class="active" href="dashboard">
                            <button
                                class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path
                                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                                    </path>
                                    <path
                                        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                                    </path>
                                </svg>
                                <p
                                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                                    dashboard
                                </p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= urlpath('pemerintah/proposal') ?>">
                            <button
                                class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#e8eaed">
                                    <path
                                        d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z" />
                                </svg>
                                <p
                                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                                    Proposal
                                </p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= urlpath('pemerintah/aduan') ?>">
                            <button
                                class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#e8eaed">
                                    <path
                                        d="M800-520q-17 0-28.5-11.5T760-560q0-17 11.5-28.5T800-600q17 0 28.5 11.5T840-560q0 17-11.5 28.5T800-520Zm-40-120v-200h80v200h-80ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0-80Zm0 400Z" />
                                </svg>
                                <p
                                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                                    Aduan
                                </p>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= urlpath('pemerintah/profil') ?>">
                            <button
                                class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd"
                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p
                                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                                    Profil
                                </p>
                            </button>
                        </a>
                    </li>
                </ul>
                <ul class="mb-4 flex flex-col gap-1">
                    <li>
                        <button logout-modal-target="logout-modal" logout-modal-toogle="logout-modal"
                            class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                            type="button text-white font-bold py-2 px-4 rounded hover:text-white-700 ml-4 blockfocus:ring-4 focus:outline-none focus:ring-blue-300 text-sm  text-center"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-5 h-5 text-inherit">
                                <path fill-rule="evenodd"
                                    d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <p
                                class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                                Logout
                            </p>
                        </button>

                    </li>
                </ul>
            </div>
        </aside>
    </div>
    <main class="flex w-full h-full">
        <?php
        if (isset($url)) {
            include $url . '.php';
        } else {
            include 'home.php';
        }
        ?>
        <!-- Main modal -->
        <div id="logout-modal" tabindex="-1" aria-hidden="true"
            class="hidden inset-y-40 -inset-x-0 fixed z-50 items-center justify-center w-full h-full">
            <div class="relative p-4 w-full max-w-2xl h-36 m-auto">
                <!-- Modal content -->
                <div class="relative bg-gray-700 rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-600">
                        <h3 class="text-xl font-semibold text-white">
                            Apakah Anda yakin ingin Logout?
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:text-white"
                            logout-modal-hide="logout-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center gap-4 border-t border-gray-200 rounded-b bg-white h-32">
                        <a href="<?= BASEURL . "masyarakat/logout" ?>"><button logout-modal-hide="logout-modal"
                                type="button"
                                class="px-6 py-3.5 ms-3 text-sm text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium  rounded-lg  text-center">
                                Iya</button></a>
                        <button logout-modal-hide="logout-modal" type="button"
                            class="px-6 py-3.5 ms-3 text-sm font-medium text-blue-900 focus:outline-none bg-white rounded-lg border border-blue-200 hover:bg-blue-100  focus:z-10 focus:ring-4 focus:ring-blue-100 ">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggleModalButtons = document.querySelectorAll('[logout-modal-toogle]');
        toggleModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('logout-modal-target');
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
        var closeModalButtons = document.querySelectorAll('[logout-modal-hide]');
        closeModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('logout-modal-hide');
                var modal = document.getElementById(target);
                modal.classList.add('hidden');
            });
        });
    });
</script>
</main>
</div>

<?php include 'view/master.php'; ?>