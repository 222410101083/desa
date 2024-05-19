<?php $title = 'Desa Jatimulyo'; ?>

<?php ob_start(); ?>
<!-- component -->
<nav id="header" class="w-full py-1 bg-white shadow-lg border-b border-blue-400">
    <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-blue-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle">

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-blue-600 pt-4 md:pt-0">
                    <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                            href="#">Home</a></li>
                    <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                            href="#">Artikel</a></li>
                    <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                            href="#">About</a></li>
                </ul>
            </nav>
        </div>
        <!-- component -->
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

        <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4" id="nav-content">
            <div class="auth flex items-center w-full md:w-full">
                <a href="login"><button
                        class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Login</button></a>
                <a href="register"><button
                        class="bg-blue-600 text-gray-200  p-2 rounded  hover:bg-blue-500 hover:text-gray-100">Register</button></a>
            </div>
        </div>
    </div>
</nav>


<section class="relative  bg-blueGray-50">
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://cdn.pixabay.com/photo/2015/01/19/12/11/landscape-603950_1280.jpg');
          ">
            <span id="blackOverlay" class="w-full h-full absolute opacity-60 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">
                            Desa Jatimulyo
                        </h1>
                        <p class="mt-4 text-lg text-blueGray-200">
                            Desa Jatimulyo adalah desa yang berada di kawasan Tengah Kota Jatimulyo,
                            Kecamatan Jatimulyo, Kabupaten Jatimulyo, Provinsi Jawa Tengah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
            style="transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <section class="pb-10 bg-blueGray-200 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                <i class="fas fa-award"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Pengajuan Proposal</h6>
                            <p class="mt-2 mb-4 text-blueGray-500">
                                Pengajuan Proposal adalah pengajuan proposal yang akan di lakukan oleh masyarakat
                                Desa Jatimulyo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-lightBlue-400">
                                <i class="fas fa-retweet"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Informasi dan Program</h6>
                            <p class="mt-2 mb-4 text-blueGray-500">
                                Informasi dan program yang akan di lakukan oleh Desa Jatimulyo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Aduan</h6>
                            <p class="mt-2 mb-4 text-blueGray-500">
                                Aduan adalah aduan yang akan di lakukan oleh masyarakat Desa Jatimulyo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="relative  pt-8 pb-6 mt-1">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                            <div class="text-sm text-blueGray-500 font-semibold py-1">
                                Made with <a href="https://www.creative-tim.com/product/notus-js"
                                    class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a
                                    href="https://www.creative-tim.com"
                                    class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    </section>
</section>
<?php $body = ob_get_clean(); ?>

<?php include 'master.php'; ?>