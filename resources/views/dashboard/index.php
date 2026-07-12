<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

// Fetch summary counts
$totVehicles = (int)$pdo->query('SELECT COUNT(*) FROM vehicles')->fetchColumn();
$activeDrivers = (int)$pdo->query("SELECT COUNT(*) FROM drivers WHERE status='Active'")->fetchColumn();
$ongoingTrips = (int)$pdo->query("SELECT COUNT(*) FROM trips WHERE status='In Transit'")->fetchColumn();
$upcomingMaint = (int)$pdo->query("SELECT COUNT(*) FROM maintenance_logs WHERE next_due_date IS NOT NULL AND next_due_date <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)")->fetchColumn();

?>
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h5>Total Vehicles</h5>
                <h2><?php echo $totVehicles; ?></h2>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h5>Active Drivers</h5>
                <h2><?php echo $activeDrivers; ?></h2>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h5>Ongoing Trips</h5>
                <h2><?php echo $ongoingTrips; ?></h2>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h5>Due Maintenance (30d)</h5>
                <h2><?php echo $upcomingMaint; ?></h2>
            </div>
        </div>
    </div>

    <hr>
    <p class="text-muted">Charts and widgets to be implemented (Chart.js)</p>

</div>

<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>
