<?php include 'view/master.php'; ?>

<div class="flex flex-col justify-center overflow-hidden bg-gray-50 py-2 w-full">
    <div class="m-2 flex flex-wrap justify-center items-center mx-auto max-w-screen-lg">
        <div class="flex flex-wrap justify-center items-center w-full">
            <?php foreach ($artikel as $item): ?>
                <div class="flex flex-col items-center mx-10 w-1/4 h-full mb-10">
                    <div
                        class="h-[300px] bg-white w-full rounded-lg shadow-md flex flex-col transition-all overflow-hidden hover:shadow-2xl">
                        <div class="  p-6">
                            <div class="mt-auto">
                                <img src="<?= BASEURL ?>/<?= $item['gambar'] ?>" alt="" class="w-full h-40 object-cover">
                            </div>
                            <h3 class="mb-4 font-semibold  text-2xl"><a href=""
                                    class="transition-all text-blue-900 hover:text-blue-600"><?= $item['judul']; ?></a>
                            </h3>
                            <p class="text-sky-800 text-sm mb-0">
                                <?= substr($item['konten'], 0, 150); ?>...
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center items-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i; ?>"
                    class="mx-1 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 <?= $i == $currentPage ? 'bg-blue-700' : '' ?>">
                    <?= $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        <!-- Pagination -->
    </div>
</div>