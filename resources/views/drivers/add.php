<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../includes/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name']);
    $lic = trim($_POST['license_number']);
    $expiry = $_POST['license_expiry'];
    if ($name && $lic && $expiry) {
        $stmt = $pdo->prepare('INSERT INTO drivers (full_name, license_number, license_expiry, contact_phone) VALUES (?, ?, ?, ?)');
        $stmt->execute([$name, $lic, $expiry, $_POST['contact_phone'] ?? '']);
        header('Location: list.php');
        exit;
    }
}
?>
<div class="container">
    <h1>Add Driver</h1>
    <form method="post">
        <div class="mb-3"><label>Full Name</label><input name="full_name" class="form-control"></div>
        <div class="mb-3"><label>License Number</label><input name="license_number" class="form-control"></div>
        <div class="mb-3"><label>License Expiry</label><input name="license_expiry" class="form-control" type="date"></div>
        <div class="mb-3"><label>Contact</label><input name="contact_phone" class="form-control"></div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php
require_once __DIR__ . '/../includes/sidebar_end.php';
require_once __DIR__ . '/../includes/footer.php';
?>
