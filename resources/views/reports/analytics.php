<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';
?>
<div class="container">
    <h1>Analytics</h1>
    <canvas id="chart1" width="400" height="200"></canvas>
    <script>
        // Chart.js placeholder
        const ctx = document.getElementById('chart1').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['A', 'B'],
                datasets: [{
                    label: 'Demo',
                    data: [1, 2]
                }]
            }
        });
    </script>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>
