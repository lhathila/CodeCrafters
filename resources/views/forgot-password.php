<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'transitops_db');

$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    
    $email = trim($_POST["email"]);
    $role = trim($_POST["role"]);
    $new_password = trim($_POST["new_password"]);
    
    // ઇમેઇલ અને રોલ મેચ થાય છે કે નહીં તે તપાસો
    $sql_check = "SELECT id FROM users WHERE email = :email AND role = :role";
    if($stmt_check = $pdo->prepare($sql_check)){
        $stmt_check->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt_check->bindParam(":role", $role, PDO::PARAM_STR);
        
        if($stmt_check->execute()){
            if($stmt_check->rowCount() == 1){
                // જો યુઝર સાચો હોય, તો પાસવર્ડ અપડેટ કરો
                $sql_update = "UPDATE users SET password = :password WHERE email = :email AND role = :role";
                if($stmt_update = $pdo->prepare($sql_update)){
                    $stmt_update->bindParam(":password", $param_password, PDO::PARAM_STR);
                    $stmt_update->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt_update->bindParam(":role", $role, PDO::PARAM_STR);
                    
                    // નવા પાસવર્ડને સિક્યોર Bcrypt હેશમાં કન્વર્ટ કરો
                    $param_password = password_hash($new_password, PASSWORD_BCRYPT);
                    
                    if($stmt_update->execute()){
                        $success = "પાસવર્ડ સફળતાપૂર્વક રીસેટ થઈ ગયો છે! હવે તમે લોગિન કરી શકો છો.";
                    } else {
                        $error = "ભૂલ આવી! પાસવર્ડ અપડેટ થઈ શક્યો નથી.";
                    }
                    unset($stmt_update);
                }
            } else {
                $error = "આપેલ ઇમેઇલ અને રોલ સિસ્ટમ સાથે મેચ થતા નથી.";
            }
        }
        unset($stmt_check);
    }
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransitOps - Reset Identity Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    :root {
        --primary: #EA580C;
        /* ઓરેન્જ થીમ ફોરગોટ મોડ માટે */
        --secondary: #06B6D4;
        --accent: #F97316;
        --dark-bg: #030712;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: radial-gradient(circle at 10% 20%, rgba(234, 88, 12, 0.12), transparent 40%),
            radial-gradient(circle at 90% 80%, rgba(6, 182, 212, 0.12), transparent 40%),
            linear-gradient(135deg, #030712 0%, #0F172A 100%);
        color: #F3F4F6;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .reset-container {
        background: rgba(17, 24, 39, 0.7);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 28px;
        padding: 45px;
        width: 100%;
        max-width: 480px;
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.5);
    }

    .brand-logo {
        font-size: 1.8rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--accent), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.5px;
    }

    .form-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #9CA3AF;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
    }

    .input-group-text {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: #6B7280 !important;
        border-top-left-radius: 12px !important;
        border-bottom-left-radius: 12px !important;
    }

    .login-input {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        color: white !important;
        border-top-right-radius: 12px !important;
        border-bottom-right-radius: 12px !important;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s;
    }

    .login-input:focus {
        border-color: var(--accent) !important;
        box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.15) !important;
        color: white !important;
    }

    .login-select option {
        background: #111827;
        color: white;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border: none;
        color: white;
        font-weight: 700;
        padding: 14px;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 4px 15px rgba(234, 88, 12, 0.25);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(234, 88, 12, 0.45);
        color: white;
    }

    .back-to-home {
        color: #6B7280;
        text-decoration: none;
        font-size: 0.85rem;
        transition: color 0.2s;
    }

    .back-to-home:hover {
        color: var(--accent);
    }
    </style>
</head>

<body>

    <div class="reset-container">
        <div class="text-center mb-4">
            <div class="brand-logo mb-2"><i class="bi bi-shield-slash me-2"></i>TransitOps</div>
            <h5 class="fw-bold text-white mb-1">Reset Access Matrix</h5>
            <p class="text-muted small">Verify node keys to override password</p>
        </div>

        <?php if(!empty($success)): ?>
        <div class="alert alert-success border-0 small text-center py-2 mb-3"
            style="background: rgba(40, 167, 69, 0.2); color: #d4edda; border-radius: 12px;">
            <?php echo $success; ?>
        </div>
        <?php endif; ?>

        <?php if(!empty($error)): ?>
        <div class="alert alert-danger border-0 small text-center py-2 mb-3"
            style="background: rgba(220, 53, 69, 0.2); color: #f8d7da; border-radius: 12px;">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label">REGISTERED EMAIL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control login-input" placeholder="username@company.com"
                        required>
                </div>
            </div>

            <!-- RBAC Role Selector -->
            <div class="mb-3">
                <label class="form-label">YOUR IDENTITY (RBAC)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <select name="role" class="form-select login-input" style="border-radius: 0 12px 12px 0 !important;"
                        required>
                        <option value="" disabled selected hidden>Choose Account Node...</option>
                        <option value="admin">System Administrator</option>
                        <option value="manager">Fleet Manager</option>
                        <option value="dispatcher">Dispatcher Desk</option>
                        <option value="safety">Safety Officer</option>
                        <option value="finance">Financial Analyst</option>
                    </select>
                </div>
            </div>

            <!-- New Password Input -->
            <div class="mb-4">
                <label class="form-label">NEW SYSTEM PASSWORD</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="new_password" class="form-control login-input"
                        placeholder="Min 8 characters" required minlength="8">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-submit w-100 mb-3">
                Override & Re-encrypt Credentials <i class="bi bi-arrow-repeat ms-2"></i>
            </button>

            <div class="text-center">
                <a href="login.php" class="back-to-home"><i class="bi bi-arrow-left me-1"></i> Remembered? Back to
                    Secure Login</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>