<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$rows = $pdo->query('SELECT e.*, v.registration_no FROM expenses e LEFT JOIN vehicles v ON v.id=e.vehicle_id ORDER BY e.incurred_at DESC LIMIT 200')->fetchAll();
?>
<div class="container">
    <h1>Expenses</h1>
    <a href="add.php" class="btn btn-primary mb-3">Add Expense</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo htmlspecialchars($r['category']); ?></td>
                    <td><?php echo $r['amount']; ?></td>
                    <td><?php echo $r['incurred_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>