<?php include 'view/master.php'; ?>
<div class="w-full flex flex-col justify-center items-center">
    <h1 class="text-2xl font-bold text-center mt-5">Dashboard Pemerintah</h1>
    <div class="justify-center w-3/4">
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

        <!--grafik -->
        <canvas id="proposalChart"></canvas>
        <script>
            var ctx = document.getElementById('proposalChart').getContext('2d');
            var proposalChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Semua Proposal', 'Proposal Disetujui', 'Proposal Ditolak'],
                    datasets: [{
                        label: 'Jumlah Proposal',
                        data: [<?php echo count($proposals); ?>, <?php echo count($approvedProposals); ?>, <?php echo count($declinedProposals); ?>],
                        backgroundColor: [
                            'lightblue',
                            'lightgreen',
                            'lightred'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
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
        </script>
    </div>
</div>