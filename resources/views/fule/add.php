<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$vehicles = $pdo->query('SELECT id, registration_no FROM vehicles')->fetchAll();
$drivers = $pdo->query('SELECT id, full_name FROM drivers')->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO fuel_logs (vehicle_id, driver_id, fill_date, liters, cost, odometer) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$_POST['vehicle_id'], $_POST['driver_id'] ?: null, $_POST['fill_date'], $_POST['liters'], $_POST['cost'], $_POST['odometer'] ?: null]);
    header('Location: logs.php');
    exit;
}
?>
<div class="container">
    <h1>Add Fuel</h1>
    <form method="post">
        <div class="mb-3"><label>Vehicle</label>
            <select name="vehicle_id" class="form-control"><?php foreach ($vehicles as $v) echo '<option value="' . $v['id'] . '">' . htmlspecialchars($v['registration_no']) . '</option>'; ?></select>
        </div>
        <div class="mb-3"><label>Driver (optional)</label>
            <select name="driver_id" class="form-control">
                <option value="">--</option><?php foreach ($drivers as $d) echo '<option value="' . $d['id'] . '">' . htmlspecialchars($d['full_name']) . '</option>'; ?>
            </select>
        </div>
        <div class="mb-3"><label>Fill Date</label><input name="fill_date" class="form-control" type="date"></div>
        <div class="mb-3"><label>Liters</label><input name="liters" class="form-control" type="number" step="0.01"></div>
        <div class="mb-3"><label>Cost</label><input name="cost" class="form-control" type="number" step="0.01"></div>
        <div class="mb-3"><label>Odometer</label><input name="odometer" class="form-control" type="number"></div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>
