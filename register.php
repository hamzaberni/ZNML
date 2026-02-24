<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: profile.php");
    exit();
}

$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció|ZOONIMAL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/auth.css">
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

<!-- Háttér -->
<div class="bg-layer">
    <div class="bg-grid"></div>
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
</div>

<div class="auth-wrapper auth-wrapper--wide">
    <a href="index.php" class="back-link">
        <svg viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
        Vissza a főoldalra
    </a>

    <div class="auth-card">

        <!-- Logo -->
        <div class="auth-logo">
            <div class="auth-logo-mark">
                <img src="assets/images/monkey.png" alt="Z FITNESS">
            </div>
            <span class="auth-brand">ZOONIMAL</span>
            <span class="auth-brand-sub">Member Portal</span>
        </div>

        <h1 class="auth-title">Regisztráció</h1>
        <p class="auth-subtitle">Csatlakozz közösségünkhöz!</p>

        <?php if ($error): ?>
            <div class="alert alert-danger">⚠ <?= $error ?></div>
        <?php endif; ?>

        <form action="backend/register.php" method="POST">

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="fullname">Teljes név</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </span>
                        <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Teljes neved" required autocomplete="name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Telefonszám</label>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        </span>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="+36201234567" required autocomplete="tel">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email cím</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    </span>
                    <input type="email" id="email" name="email" class="form-input" placeholder="pelda@email.hu" required autocomplete="email">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Jelszó</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    </span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Min. 6 karakter"
                        required
                        autocomplete="new-password"
                        oninput="checkStrength(this.value)"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password', this)" aria-label="Jelszó megjelenítése">
                        <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                    </button>
                </div>
                <div class="password-strength">
                    <div class="strength-bar" id="bar1"></div>
                    <div class="strength-bar" id="bar2"></div>
                    <div class="strength-bar" id="bar3"></div>
                    <div class="strength-bar" id="bar4"></div>
                </div>
                <div class="strength-text" id="strengthText"></div>
            </div>

            <div class="terms-row">
                <input type="checkbox" id="terms" class="terms-checkbox" required>
                <label for="terms" class="terms-label">
                    Elfogadom az <a href="#">Általános Szerződési Feltételeket</a> és az <a href="#">Adatvédelmi Tájékoztatót</a>
                </label>
            </div>

            <button type="submit" class="btn-auth">Regisztrálok</button>
        </form>

        <div class="auth-divider"><span>vagy</span></div>

        <div class="auth-link-row">
            Már van fiókod? <a href="login.php">Bejelentkezés</a>
        </div>

    </div>
</div>

<script src="assets/js/auth.js"></script>
</body>
</html>