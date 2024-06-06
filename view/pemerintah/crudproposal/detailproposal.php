<?php
include 'view/master.php'; ?>
<div class="flex w-full mx-4">
    <div class="flex min-h-screen items-center justify-center w-full">
        <div class="flex w-full flex-row bg-clip-border rounded-xl text-gray-700 shadow-md">
            <a href="#" onclick="history.back();" class="w-24 h-10 bg-red-500 hover:bg-red-700 text-white text-center font-bold py-2 px-4 rounded mx-2">Kembali</a>
            <div class="m-0 w-3/4 bg-white bg-clip-border rounded-xl text-gray-700">
                <embed class="w-full h-[90vh]" src="<?= BASEURL . $proposal['file_path']; ?>"
                    type="application/pdf"></embed>
            </div>
            <div class="p-6">
                <h6
                    class="mb-4 block font-sans text-xl font-bold leading-relaxed tracking-normal text-black-500 antialiased">
                    Detail Proposal
                </h6>
                <h4
                    class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    <?= $proposal['judul']; ?>
                </h4>
                <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                    <?= $proposal['deskripsi']; ?>
                </p>
            </div>
        </div>
    </div>
</div>