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
                            href="<?= BASEURL ?>">Home</a></li>
                    <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2"
                            href="<?= BASEURL ?>artikel">Artikel</a></li>
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
    <section class="pb-5 bg-blueGray-200 -mt-24">
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
    </section>
</section>
<section class="flex justify-center items-center">
    <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-4 md:py-1 md:px-6 py-9 px-4 w-96 sm:w-auto">
        <div role="main" class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800">Berita Terbaru</h1>
            <p
                class="text-base leading-normal text-center text-gray-600 dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">
                Baca artikel dan program desa Jatimulyo</p>
        </div>
        <div class="lg:flex items-stretch md:mt-12 mt-8">
            <div class="lg:w-full">
                <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 ">
                    <div class="sm:w-1/3 relative">
                        <div>
                            <p style="background-color: rgba(0, 0, 0, 0.5);"
                                class=" p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">1
                                April 2024</p>
                            <div class="absolute bottom-0 left-0 p-6 bg-black"
                                style="background-color: rgba(0, 0, 0, 0.5);">
                                <h2 class="text-xl font-semibold text-white">Pentingnya Vaksinasi untuk Sapi
                                </h2>
                                <p class="text-base leading-4 text-white mt-2">Vaksinasi teratur membantu
                                    mencegah penyakit menular pada sapi dan meningkatkan kualitas kesehatan
                                    ternak.</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://kampungkb.bkkbn.go.id/storage/17/1702/170216/1702162011/46605/intervensi/2023/07/27/570619/16904595860.jpeg"
                            class="w-[325px] h-[330px] object-cover " alt="Vaksinasi Sapi" />
                    </div>
                    <div class="sm:w-1/3 sm:mt-0 mt-4 relative">
                        <div>
                            <p style="background-color: rgba(0, 0, 0, 0.5);"
                                class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12
                                April 2024</p>
                            <div class="absolute bottom-0 left-0 p-6" style="background-color: rgba(0, 0, 0, 0.5);">
                                <h2 class="text-xl font-semibold text-white">Manfaat Nutrisi Tepat untuk Sapi
                                </h2>
                                <p class="text-base leading-4 text-white mt-2">Pemilihan nutrisi yang tepat
                                    esensial untuk kesehatan dan produktivitas sapi.</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="w-[325px] h-[330px] object-cover">
                            <img class="w-full h-full object-cover"
                                src="https://akcdn.detik.net.id/community/media/visual/2022/06/18/vaksinasi-pmk-di-sidoarjo_169.jpeg?w=700&q=90"
                                alt="Nutrisi Sapi" />
                        </div>
                    </div>
                    <div class="sm:w-1/3 sm:mt-0 mt-4 relative">
                        <div>
                            <p style="background-color: rgba(0, 0, 0, 0.5);"
                                class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12
                                April 2024</p>
                            <div class="absolute bottom-0 left-0 p-6" style="background-color: rgba(0, 0, 0, 0.5);">
                                <h2 class="text-xl font-semibold text-white">Manfaat Nutrisi Tepat untuk Sapi
                                </h2>
                                <p class="text-base leading-4 text-white mt-2">Pemilihan nutrisi yang tepat
                                    esensial untuk kesehatan dan produktivitas sapi.</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://klikjatim.com/wp-content/uploads/2022/06/IMG-20220628-WA0090.jpg"
                            class="w-[325px] h-[330px] object-cover" alt="Nutrisi Sapi" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section>
    <div class="mt-10 min-h-[500px] flex flex-col p-4 sm:p-4 md:p-4 justify-center bg-[#E2E8F0]">
        <!-- Themes: blue, purple and teal -->
        <div class="mx-auto max-w-6xl">
            <h2 class="sr-only">Featured case study</h2>
            <section class="font-sans text-black">
                <div
                    class="[ lg:flex lg:items-center ] [ fancy-corners fancy-corners--large fancy-corners--top-left fancy-corners--bottom-right ]">
                    <div class="flex-shrink-0 self-stretch sm:flex-basis-40 md:flex-basis-50 xl:flex-basis-60">
                        <div class="h-full">
                            <article class="h-full">
                                <div class="h-full">
                                    <img class="h-full object-cover"
                                        src="https://kempalan.com/wp-content/uploads/2023/10/WhatsApp-Image-2023-09-30-at-11.13.37.jpeg"
                                        width="733" height="412" alt='""' typeof="foaf:Image" />
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="p-6 bg-grey">
                        <div class="leading-relaxed">
                            <h2 class="leading-tight text-4xl font-bold">Program Acara Desa </h2>
                            <p class="mt-4 mb-8">Dapatkan bantuan dana dari desa dalam mengadakan perlombaan dan acara di Desa Jatimulyo.</p>
                            <p><a class="mt-4 button bg-[#538D22] p-4 text-white font-semibold hover:bg-[#538D22]/80 rounded-[2px]"
                                    href="/register">Daftar
                                    Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<footer>
    <div class="bg-gray-800 py-4 text-gray-400 ">
        <div class="container px-4 mx-auto flex justify-between">
            <div class="mx-4 flex flex-warp justify-between">
                <div class="px-4 my-4 w-full">
                    <a href="/" class="block w-56 mb-10">
                        <text class="text-white font-bold text-4xl">
                            <tspan>Desa Jatimulyo</tspan>
                        </text>
                    </a>
                    <p class="text-justify">
                        Desa Jatimulyo, Kecamatan Jenggawah, Kabupaten Jember, Provinsi Jawa Timur, Indonesia
                    </p>
                </div>

                <div class="px-4 my-4 w-full sm:w-auto">
                    <div>
                        <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Web Desa</h2>
                    </div>
                    <ul class="leading-8">
                        <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                        <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
                        <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
                    </ul>
                </div>
                <div class="px-4 my-4 w-full sm:w-auto">
                    <div>
                        <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Contact
                        </h2>
                    </div>
                    <a href="#"
                        class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                            </path>
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                            </path>
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full hover:text-blue-400 hover:border-blue-400">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-800 text-white text-center p-4 mt-[1px]">
        Hak Cipta © 2024 Desa Jatimulyo
    </div>
    <?php $body = ob_get_clean(); ?>

    <?php include 'master.php'; ?>