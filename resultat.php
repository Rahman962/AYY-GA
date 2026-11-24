<?php
session_start();

$namn = $_SESSION["namn"] ?? "";
$forsok = [];

if ($namn != "" && file_exists("resultat.txt")) {
    foreach (file("resultat.txt", FILE_IGNORE_NEW_LINES) as $rad) {
        $d = explode(";", $rad); // namn, datum, övning, poäng, antal
        if (count($d) == 5 && $d[0] == $namn) {
            $forsok[] = $d;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat – AYY-HP</title>
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
            <h1 class="page-title">Resultat</h1>
            <p class="page-text">Se om du har blivit bättre sedan första försöket.</p>
        </div>
    </section>

    <main>
        <div class="enkel-ruta">

            <?php if ($namn == ""): ?>
                <p>Du måste <a href="login.php">logga in</a> för att se dina resultat.</p>

            <?php elseif (count($forsok) == 0): ?>
                <p>Inga försök sparade än, <?= htmlspecialchars($namn) ?>. Gör en övning först!</p>

            <?php else: ?>
                <?php foreach (["Suffix", "Synonymer"] as $ovning): ?>
                    <?php
                    $lista = array_values(array_filter($forsok, fn($d) => $d[2] == $ovning));
                    if (count($lista) < 2) continue;
                    $forsta = $lista[0][3];
                    $senaste = $lista[count($lista) - 1][3];
                    ?>
                    <p><strong><?= $ovning ?>:</strong> första försöket <?= $forsta ?> rätt, senaste <?= $senaste ?> rätt
                        (skillnad: <?= $senaste - $forsta ?>)</p>
                <?php endforeach; ?>

                <table>
                    <tr>
                        <th>Datum</th>
                        <th>Övning</th>
                        <th>Resultat</th>
                    </tr>
                    <?php foreach ($forsok as $d): ?>
                        <tr>
                            <td><?= htmlspecialchars($d[1]) ?></td>
                            <td><?= htmlspecialchars($d[2]) ?></td>
                            <td><?= $d[3] ?> av <?= $d[4] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

        </div>
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