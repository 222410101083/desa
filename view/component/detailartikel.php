<?php include 'view/master.php'; ?>
<div class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-5">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    <?= var_dump($artikel); ?>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Penulis: <?= $artikel['penulis']; ?>
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Gambar
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <img src="<?= $artikel['gambar']; ?>" alt="Gambar Artikel" class="w-full h-auto">
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Konten
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <?= $artikel['konten']; ?>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
