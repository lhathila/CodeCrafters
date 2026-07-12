<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$vehicles = $pdo->query('SELECT id, registration_no FROM vehicles')->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO maintenance_logs (vehicle_id, service_type, service_date, cost, notes, next_due_date) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$_POST['vehicle_id'], $_POST['service_type'], $_POST['service_date'], $_POST['cost'], $_POST['notes'], $_POST['next_due_date'] ?: null]);
    header('Location: list.php');
    exit;
}
?>
<div class="container">
    <h1>Add Maintenance</h1>
    <form method="post">
        <div class="mb-3"><label>Vehicle</label>
            <select name="vehicle_id" class="form-control"><?php foreach ($vehicles as $v) echo '<option value="' . $v['id'] . '">' . htmlspecialchars($v['registration_no']) . '</option>'; ?></select>
        </div>
        <div class="mb-3"><label>Service Type</label><input name="service_type" class="form-control"></div>
        <div class="mb-3"><label>Service Date</label><input name="service_date" class="form-control" type="date"></div>
        <div class="mb-3"><label>Cost</label><input name="cost" class="form-control" type="number" step="0.01"></div>
        <div class="mb-3"><label>Next Due Date</label><input name="next_due_date" class="form-control" type="date"></div>
        <div class="mb-3"><label>Notes</label><textarea name="notes" class="form-control"></textarea></div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>
