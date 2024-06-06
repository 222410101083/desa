<?php include 'view/master.php'; ?>

<?php $title = 'Desa Jatimulyo'; ?>
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
                            href="<?= BASEURL ?>">About</a></li>
                </ul>
            </nav>
        </div>
</nav>
<div class="flex flex-col justify-center overflow-hidden bg-gray-50 py-2">
    <div class="m-2 flex flex-wrap justify-start items-start mx-auto max-w-screen-lg">
        <div class="header flex w-full justify-center">
            <h2 class="font-black pb-1 mb-10 text-5xl text-blue-900 relative">
                Berita Desa</h2>
        </div>
        <div class="flex flex-wrap justify-between w-full">
            <?php foreach ($artikel as $index => $item): ?>
                <div class="flex flex-col items-center mx-10 w-1/4 h-96">
                    <div
                        class="h-[360px] bg-white w-full rounded-lg shadow-md flex flex-col transition-all overflow-hidden hover:shadow-2xl">
                        <div class="  p-6">

                            <div
                                class="pb-3 mb-4 border-b border-stone-200 text-xs font-medium flex justify-between text-blue-900">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <?= $item['created_at'] ?>
                                </span>
                            </div>
                            <h3 class="mb-4 font-semibold  text-2xl"><a href="/artikel/detail/<?= $item['id']; ?>"
                                    class="transition-all text-blue-900 hover:text-blue-600"><?= $item['judul']; ?></a>
                            </h3>
                            <p class="text-sky-800 text-sm mb-0">
                                <?= substr($item['konten'], 0, 150); ?>...
                            </p>
                        </div>
                        <div class="mt-auto">
                            <img src="<?= BASEURL ?>/<?= $item['gambar'] ?>" alt="" class="w-full h-48 object-cover">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>