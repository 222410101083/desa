<div class="flex flex-col w-full mx-4">
    <a href="#" onclick="history.back();"
        class=" mt-10 h-10 w-24 bg-red-500 hover:bg-red-700 text-white text-center font-bold py-2 px-4 rounded mx-2">Kembali</a>
    <div class="flex flex-row bg-clip-border rounded-xl text-gray-700 shadow-md mt-10 w-full">

        <div class="w-3/4 p-6">
            <h6
                class="mb-4 block font-sans text-xl font-bold leading-relaxed tracking-normal text-black-500 antialiased">
                Detail Aduan
            </h6>
            <?php
            // Set lokalisasi ke Indonesia
            $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

            // Membuat objek DateTime
            $date = new DateTime($aduan['tanggal']);

            // Format tanggal dalam bahasa Indonesia
            $tanggalDeskriptif = $formatter->format($date);
            ?>
            <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-7000 antialiased">
                 Kategori <b><?= $aduan['kategori']; ?></b>, Tanggal <b><?= $tanggalDeskriptif; ?></b>
            </p>
            <h4
                class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                <?= $aduan['judul']; ?>
            </h4>
            <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                <?= $aduan['deskripsi']; ?>
            </p>
        </div>
    </div>
</div>
</div>