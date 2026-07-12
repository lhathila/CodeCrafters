<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$vehicles = $pdo->query('SELECT id, registration_no FROM vehicles')->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO expenses (trip_id, vehicle_id, category, amount, incurred_at, notes) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([null, $_POST['vehicle_id'] ?: null, $_POST['category'], $_POST['amount'], $_POST['incurred_at'], $_POST['notes']]);
    header('Location: list.php');
    exit;
}
?>
<div class="container">
    <h1>Add Expense</h1>
    <form method="post">
        <div class="mb-3"><label>Vehicle (optional)</label>
            <select name="vehicle_id" class="form-control">
                <option value="">--</option><?php foreach ($vehicles as $v) echo '<option value="' . $v['id'] . '">' . htmlspecialchars($v['registration_no']) . '</option>'; ?>
            </select>
        </div>
        <div class="mb-3"><label>Category</label><input name="category" class="form-control"></div>
        <div class="mb-3"><label>Amount</label><input name="amount" class="form-control" type="number" step="0.01"></div>
        <div class="mb-3"><label>Date</label><input name="incurred_at" class="form-control" type="date"></div>
        <div class="mb-3"><label>Notes</label><textarea name="notes" class="form-control"></textarea></div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>
