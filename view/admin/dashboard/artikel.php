<?php $body = ob_get_clean(); ?>
<?php include 'view/master.php'; ?>
<div class="bg-gray-100">
    <h2 class="text-xl font-semibold mb-4">Daftar Artikel</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($artikels as $artikel): ?>
            <div class="bg-gray-100 p-4 rounded-md">
                <h3 class="text-lg font-semibold mb-2"><?= $artikel['judul'] ?></h3>
                <p class="text-sm mb-4"><?= $artikel['isi'] ?></p>
                <p class="text-sm mb-4">Penulis: <?= $artikel['penulis'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>