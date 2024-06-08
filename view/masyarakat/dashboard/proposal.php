<?php
include 'view/master.php';
?>
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-left my-6">Daftar Proposal</h1>
    <!-- Modal toggle -->

    <div class="flex justify-between">
        <a href="proposal/add"><button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                Proposal</button></a>
        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Cari Proposal..."
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>
    <div class="overflow-x-auto mt-2">
        <table class="w-[1230px] bg-white shadow-md rounded-lg text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Nomor</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-left">Judul</th>
                    <!-- <th class="w-1/3 py-3 px-4 uppercase font-semibold text-left">Deskripsi</th> -->
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Tanggal Pengajuan</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-left">Status</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php
                $no = 1;
                if (is_array($proposals) && $proposals) {
                    $filteredProposals = array_filter($proposals, function ($proposal) {
                        return $proposal['id_user'] == $_SESSION['user']['id'];
                    });
                } else {
                    $filteredProposals = [];
                }

                foreach ($filteredProposals as $proposal):
                    $statusClass = '';
                    if ($proposal['status'] === 'Disetujui') {
                        $statusClass = 'bg-green-100 hover:bg-green-200';
                    } elseif ($proposal['status'] === 'Ditolak') {
                        $statusClass = 'bg-red-100 hover:bg-red-200';
                    } elseif ($proposal['status'] === 'Ditinjau') {
                        $statusClass = 'bg-yellow-100 hover:bg-yellow-200';
                    }
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 <?= $statusClass ?>">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4"><?= $proposal['judul'] ?></td>
                        <td class="py-3 px-4"><?= $proposal['tanggal_pengajuan'] ?></td>
                        <td class="py-3 px-4"><?= $proposal['status'] ?></td>
                        <td class="py-3 px-4 flex justify-center items-center">
                            <a href="<?= BASEURL . "masyarakat/proposal/detail?id=" . $proposal['id_proposal'] ?>"
                                class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</a>
                            <a href="<?= BASEURL . "masyarakat/proposal/edit?id=" . $proposal['id_proposal'] ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">Edit</a>
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hover:text-white-700 ml-4 blockfocus:ring-4 focus:outline-none focus:ring-blue-300 text-sm  text-center"
                                type="button">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" data-modal-show="default-modal"
    class="hidden fixed inset-y-52 -inset-x-0 z-50 items-center justify-center w-full h-full">
    <div class="relative p-4 w-full max-w-2xl h-auto m-auto">
        <!-- Modal content -->
        <div class="relative bg-gray-700 rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Apakah Anda yakin ingin menghapusnya?
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-center p-4 border-t border-gray-200 rounded-b bg-white">
                <a href="<?= BASEURL . "masyarakat/proposal/delete?id=" . $proposal['id_proposal'] ?>"><button
                        data-modal-hide="default-modal" type="button"
                        class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Iya</button></a>
                <button data-modal-hide="default-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-blue-900 focus:outline-none bg-white rounded-lg border border-blue-200 hover:bg-blue-100  focus:z-10 focus:ring-4 focus:ring-blue-100 ">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        var searchText = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?= urlpath("masyarakat/proposal/cari") ?>?query=' + searchText, true);
        console.log(xhr);
        xhr.onload = function () {
            if (this.status === 200) {
                document.querySelector('tbody').innerHTML = this.responseText;
            }
        }
        xhr.send();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggleModalButtons = document.querySelectorAll('[data-modal-toggle]');
        toggleModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('data-modal-target');
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
        var closeModalButtons = document.querySelectorAll('[data-modal-hide]');
        closeModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('data-modal-hide');
                var modal = document.getElementById(target);
                modal.classList.add('hidden');
            });
        });
    });
</script>