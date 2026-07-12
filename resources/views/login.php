<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransitOps - Secure Gatekeeper Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2 family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563EB;
            --secondary: #06B6D4;
            --accent: #38BDF8;
            --dark-bg: #030712;
            --card-dark: #111827;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 10% 20%, rgba(6, 182, 212, 0.15), transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(37, 99, 235, 0.12), transparent 40%),
                        linear-gradient(135deg, #030712 0%, #0F172A 100%);
            color: #F3F4F6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Glassmorphism Login Card */
        .login-container {
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

        /* Modern Styled Inputs */
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
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.15) !important;
            color: white !important;
        }

        .login-select {
            border-radius: 12px !important;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%239CA3AF' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 12px auto;
        }

        .login-select option {
            background: #111827;
            color: white;
        }

        /* Neon Glow Button */
        .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            font-weight: 700;
            padding: 14px;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.25);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(6, 182, 212, 0.45);
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

    <div class="login-container">
        <!-- Header / Logo -->
        <div class="text-center mb-4">
            <div class="brand-logo mb-2"><i class="bi bi-truck me-2"></i>TransitOps</div>
            <h5 class="fw-bold text-white mb-1">Central Security Gateway</h5>
            <p class="text-muted small">Enter your identity matrix credentials below</p>
        </div>

        <!-- Login Form -->
        <form action="" method="POST">
            <!-- Email Input -->
            <div class="mb-3">
                <label class="form-label">CORPORATE EMAIL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control login-input" placeholder="username@company.com" required autocomplete="off">
                </div>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label">PASSWORD</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control login-input" placeholder="••••••••" required>
                </div>
            </div>

            <!-- RBAC Role Selector -->
            <div class="mb-4">
                <label class="form-label">SYSTEM IDENTITY (RBAC)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <select name="role" class="form-select login-input login-select" required>
                        <option value="" disabled selected hidden>Choose Account Node...</option>
                        <option value="admin">System Administrator</option>
                        <option value="manager">Fleet Manager</option>
                        <option value="dispatcher">Dispatcher Desk</option>
                        <option value="safety">Safety Officer</option>
                        <option value="finance">Financial Analyst</option>
                    </select>
                </div>
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="btn btn-submit w-100 mb-3">
                Authenticate & Boot Session <i class="bi bi-shield-lock ms-2"></i>
            </button>

            <!-- Back navigation link -->
            <div class="text-center">
                <a href="index.php" class="back-to-home"><i class="bi bi-arrow-left me-1"></i> Return to Terminal Home</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>