<?php include 'view/master.php'; ?>
<div class="w-full flex flex-col justify-center items-center">
    <h1 class="text-2xl font-bold text-center mt-5">Dashboard Pemerintah</h1>
    <div class="justify-center w-3/4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md" id="downloadPDF">Print</button>
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

        <!--grafik -->
        <canvas id="proposalChart"></canvas>
        <script>
            var ctx = document.getElementById('proposalChart').getContext('2d');
            var proposalChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Semua Proposal', 'Proposal Disetujui', 'Proposal Ditinjau', 'Proposal Ditolak'],
                    datasets: [{
                        label: 'Jumlah Proposal Diajukan',
                        data: [<?php echo count($proposals); ?>, <?php echo count($approvedProposals); ?>, <?php echo count($pendingProposals); ?>, <?php echo count($declinedProposals); ?>],
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
                    }
                }
            });

            document.getElementById('downloadPDF').addEventListener('click', function() {
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
        </script>
    </div>
</div>