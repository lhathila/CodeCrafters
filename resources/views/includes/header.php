<?php if (session_status() === PHP_SESSION_NONE) session_start();
$app = require __DIR__ . '/config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($app['app']['name']); ?></title>
    <link rel="stylesheet" href="/TransitOps/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/TransitOps/assets/css/responsive.css">
    <link rel="stylesheet" href="/TransitOps/assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/TransitOps/assets/css/app.css">
</head>

<body>
    <?php // simple wrapper start 
    ?>
    <div class="container-fluid">