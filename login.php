<?php
/**
 * login.php – Login Page
 *
 * Simple prototype login form. No real authentication is performed.
 * Any username/password combination will log the user in.
 */

session_start();

// ── Handle Login Submission ───────────────────────────────────────────────────
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Prototype: accept any non-empty credentials
    if ($username !== '' && $password !== '') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username']  = htmlspecialchars($username);
        header('Location: index.php');
        exit;
    } else {
        $error = 'Please enter both username and password.';
    }
}

// If already logged in, redirect to dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$page_title = 'Login | ASA Loan Management System';
$root_path  = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ══════════════ LOGIN PAGE ══════════════ -->
<div class="login-wrapper">
    <div class="login-card">

        <!-- Logo / Branding -->
        <div class="login-logo">
            <div class="logo-circle">
                <i class="bi bi-bank2"></i>
            </div>
            <h4>ASA Loan Management</h4>
            <p>Loan Management System &mdash; Prototype</p>
        </div>

        <!-- Error Alert -->
        <?php if ($error): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 mb-3"
                 style="font-size:.85rem;border-radius:8px;">
                <i class="bi bi-exclamation-circle-fill"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="login.php" novalidate>

            <div class="mb-3">
                <label class="form-label" for="username">
                    <i class="bi bi-person-fill me-1"></i>Username
                </label>
                <input type="text"
                       id="username"
                       name="username"
                       class="form-control"
                       placeholder="Enter username"
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                       autocomplete="username"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label" for="password">
                    <i class="bi bi-lock-fill me-1"></i>Password
                </label>
                <div class="input-group">
                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control"
                           placeholder="Enter password"
                           autocomplete="current-password"
                           required>
                    <button type="button"
                            class="btn btn-outline-secondary"
                            onclick="togglePwd()"
                            tabindex="-1">
                        <i class="bi bi-eye" id="pwdIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>

        </form>

        <!-- Demo hint -->
        <div class="text-center mt-4">
            <small class="text-muted d-block">
                <i class="bi bi-info-circle me-1"></i>
                <strong>Prototype:</strong> Enter any username and password to login.
            </small>
            <small class="text-muted">e.g. &nbsp;<code>admin</code> / <code>admin123</code></small>
        </div>

    </div>
</div>
<!-- ══════════════ END LOGIN PAGE ══════════════ -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Toggle password visibility
function togglePwd() {
    const pwd  = document.getElementById('password');
    const icon = document.getElementById('pwdIcon');
    if (pwd.type === 'password') {
        pwd.type  = 'text';
        icon.className = 'bi bi-eye-slash';
    } else {
        pwd.type  = 'password';
        icon.className = 'bi bi-eye';
    }
}
</script>

</body>
</html>
