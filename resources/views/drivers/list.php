<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$rows = $pdo->query('SELECT * FROM drivers ORDER BY id DESC LIMIT 100')->fetchAll();
?>
<div class="container">
    <h1>Drivers</h1>
    <a href="add.php" class="btn btn-primary mb-3">Add Driver</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>License</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><a href="details.php?id=<?php echo $r['id']; ?>"><?php echo htmlspecialchars($r['full_name']); ?></a></td>
                    <td><?php echo htmlspecialchars($r['license_number']); ?></td>
                    <td><?php echo $r['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>