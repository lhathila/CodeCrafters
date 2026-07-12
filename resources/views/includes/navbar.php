<?php
// Ensure $app is available when this include is used standalone
if (!isset($app) || !is_array($app)) {
    $app = require __DIR__ . '/config.php';
}
$appName = isset($app['app']['name']) ? $app['app']['name'] : 'TransitOps';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/TransitOps/index.php"><?php echo htmlspecialchars($appName); ?></a>
        <div class="d-flex">
            <div class="me-3">
                <input id="globalSearch" class="form-control" placeholder="Search...">
            </div>
            <div>
                <a href="#" id="notifToggle" class="btn btn-outline-secondary"><i class="fas fa-bell"></i></a>
                <a href="#" class="btn btn-outline-secondary ms-2"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </div>
</nav>