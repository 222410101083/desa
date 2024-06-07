<?php
include 'view/master.php';
?>
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
<div class="bg-white font-family-karla">

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class=" md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="<?= BASEURL ?>/<?= $artikel['gambar'] ?>">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4"><?= $artikel['judul'] ?></a>
                    <p href="#" class="text-sm pb-8">
                        Oleh <a href="#" class="font-semibold hover:text-gray-800"><?= $artikel['name'] ?></a>,
                        Dipublikasi pada <?= $artikel['created_at'] ?>
                    </p>
                <div class="ql-editor">
                    <?php echo $artikel['konten']; ?>
                </div>
                </div>
            </article>
        </section>
    </div>
</div>
<style>
    .ql-editor {
        /* Custom styles */
        font-family: Arial, sans-serif;
        line-height: 1.6;
        h1 {
            font-size: 2.5em;
        }
        h2 {
            font-size: 2.5em;
            margin-bottom: 1em;
            margin-top: 1em;
        }
        h3 {
            font-size: 1.5em;
            margin-bottom: 1em;
            margin-top: 1em;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 1em;
            margin-top: 1em;
        }
    }
</style>
