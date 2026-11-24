<?php
session_start();

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

if (isset($_POST["namn"]) && trim($_POST["namn"]) != "") {
    $_SESSION["namn"] = str_replace(";", "", trim($_POST["namn"]));
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga in – AYY-HP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="enkel.css">
    <script src="script.js" defer></script>
</head>

<body>

    <header class="site-header">
        <a class="logo" href="index.html">AYY-HP</a>

        <svg class="menu-icon" onclick="toggleMenu()" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="m2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5" />
        </svg>

        <nav class="main-nav" id="mainNav">
            <a href="index.html">Övningar</a>
            <a href="resultat.php">Resultat</a>
            <a href="tips.html">Tips</a>
            <a class="btn btn-outline" href="login.php">Logga in</a>
        </nav>
    </header>

    <section class="page-intro">
        <div class="page-intro-content">
            <h1 class="page-title">Logga in</h1>
            <p class="page-text">Skriv ditt namn så sparas dina resultat.</p>
        </div>
    </section>

    <main>
        <?php if (isset($_SESSION["namn"])): ?>
            <div class="enkel-ruta">
                <p>Du är inloggad som <strong><?= htmlspecialchars($_SESSION["namn"]) ?></strong>.</p>
                <a class="btn btn-outline" href="login.php?logout=1">Logga ut</a>
            </div>
        <?php else: ?>
            <form class="enkel-ruta" method="post" action="login.php">
                <label>Ditt namn: <input type="text" name="namn" required></label>
                <button class="btn btn-primary" type="submit">Logga in</button>
            </form>
        <?php endif; ?>
    </main>

    <footer class="site-footer">
        <div class="footer-bottom">
            <span class="logo">AYY-HP</span>
            <a href="login.php">Logga in</a>
            <p>Skolprojekt av Yaman, Yacoub, Abdulrahamn</p>
        </div>
    </footer>

</body>

</html>