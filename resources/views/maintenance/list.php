<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$rows = $pdo->query('SELECT m.*, v.registration_no FROM maintenance_logs m JOIN vehicles v ON v.id=m.vehicle_id ORDER BY m.service_date DESC LIMIT 200')->fetchAll();
?>
<div class="container">
    <h1>Maintenance Logs</h1>
    <a href="add.php" class="btn btn-primary mb-3">Add Maintenance</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo htmlspecialchars($r['registration_no']); ?></td>
                    <td><?php echo htmlspecialchars($r['service_type']); ?></td>
                    <td><?php echo $r['service_date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>