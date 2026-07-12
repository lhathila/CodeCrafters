<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

$id = (int)($_GET['id'] ?? 0);
$row = $pdo->prepare('SELECT * FROM drivers WHERE id = ?');
$row->execute([$id]);
$driver = $row->fetch();
?>
<div class="container">
    <h1>Driver Details</h1>
    <?php if (!$driver): ?>
        <div class="alert alert-warning">Driver not found</div>
    <?php else: ?>
        <dl class="row">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($driver['full_name']); ?></dd>
            <dt class="col-sm-3">License</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($driver['license_number']); ?></dd>
            <dt class="col-sm-3">Expiry</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($driver['license_expiry']); ?></dd>
        </dl>
    <?php endif; ?>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>