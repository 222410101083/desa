<?php include 'view/master.php'; ?>
<div class="flex flex-col justify-center items-center w-full h-full">
    <div class="w-full flex flex-col justify-center items-center">
        <h1 class="text-2xl font-bold mt-5">Dashboard Masyarakat</h1>
        <p class="text-center mt-2 mb-5">Selamat datang, <?= $_SESSION['user']['name']; ?></p>
        <div class="justify-center w-3/4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md" id="downloadPDF">Print</button>
            <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
            <!--grafik -->
            <canvas id="proposalChart"></canvas>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('proposalChart').getContext('2d');
                    var proposalChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Semua Proposal', 'Proposal Disetujui', 'Proposal Ditinjau', 'Proposal Ditolak'],
                            datasets: [{
                                label: 'Jumlah Proposal Diajukan',
                                data: [
                                    <?php echo isset($userProposals) ? count($userProposals) : 0; ?>, 
                                    <?php echo isset($userApprovedProposals) ? count($userApprovedProposals) : 0; ?>, 
                                    <?php echo isset($userPendingProposals) ? count($userPendingProposals) : 0; ?>, 
                                    <?php echo isset($userDeclinedProposals) ? count($userDeclinedProposals) : 0; ?>
                                ],
                                backgroundColor: [
                                    'lightblue',
                                    'lightgreen',
                                    'lightyellow',
                                    'lightcoral'
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });

                    document.getElementById('downloadPDF').addEventListener('click', function () {
                        const { jsPDF } = window.jspdf;
                        const doc = new jsPDF({
                            orientation: 'landscape',
                            unit: 'mm',
                            format: 'a4'
                        });

                        const chartDataURL = document.getElementById('proposalChart').toDataURL('image/png');
                        // Menyesuaikan ukuran gambar pada PDF
                        doc.addImage(chartDataURL, 'PNG', 10, 10, 277, 180); // Lebar hampir penuh dan tinggi proporsional
                        doc.save('grafik-proposal.pdf');
                    });
                });
            </script>
        </div>
    </div>
    <div class="flex-grow border-t border-black-400"></div>
    <span class="flex-shrink mx-4 text-black-400">Proposal</span>
    <div class="flex-grow border-t border-black-400"></div>
    <div class="text-center mt-20 text-2xl font-bold">Grafik Aduan</div>
    <div class="justify-center w-3/4 mt-2">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md" id="printAduanChart">Print</button>
        <div class="flex justify-center items-center">
            <canvas id="aduanChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var colors = ['rgba(255, 32, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 100, 0.2)', 'rgba(54, 100, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'];
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('aduanChart').getContext('2d');
                    var totalAduan = 0;
                    <?php foreach ($aduans as $item) { ?>
                        totalAduan += <?= $item['jumlah']; ?>;
                    <?php } ?>
                    var aduanChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php foreach ($aduans as $item)
                                echo '"' . $item['kategori'] . '",'; ?> 'Total'],
                            datasets: [{
                                label: 'Jumlah Aduan',
                                data: [<?php foreach ($aduans as $item)
                                    echo $item['jumlah'] . ','; ?> totalAduan],
                                backgroundColor: colors.slice(0, <?php echo count($aduans) + 1; ?>),
                                borderColor: colors.map(color => color.replace('0.2', '1')),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });

                    document.getElementById('printAduanChart').addEventListener('click', function () {
                        const { jsPDF } = window.jspdf;
                        const doc = new jsPDF({
                            orientation: 'landscape',
                            unit: 'mm',
                            format: 'a4'
                        });

                        const chartDataURL = document.getElementById('aduanChart').toDataURL('image/png');
                        doc.addImage(chartDataURL, 'PNG', 10, 10, 277, 180); // Lebar hampir penuh dan tinggi proporsional
                        doc.save('grafik-aduan.pdf');
                    });
                });
            </script>
        </div>
        <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-black-400"></div>
            <span class="flex-shrink mx-4 text-black-400">Aduan</span>
            <div class="flex-grow border-t border-black-400"></div>
        </div>