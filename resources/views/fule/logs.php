<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$rows = $pdo->query('SELECT f.*, v.registration_no, d.full_name as driver FROM fuel_logs f JOIN vehicles v ON v.id=f.vehicle_id LEFT JOIN drivers d ON d.id=f.driver_id ORDER BY f.fill_date DESC LIMIT 200')->fetchAll();
?>
<div class="container">
    <h1>Fuel Logs</h1>
    <a href="add.php" class="btn btn-primary mb-3">Add Fuel</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Liters</th>
                <th>Cost</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo htmlspecialchars($r['registration_no']); ?></td>
                    <td><?php echo $r['liters']; ?></td>
                    <td><?php echo $r['cost']; ?></td>
                    <td><?php echo $r['fill_date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>