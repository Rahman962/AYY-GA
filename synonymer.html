<?php

// Frågor: text, svarsalternativ och rätt bokstav
$fragor = [
    1 => [
        "text" => 'Vad betyder "benägen"?',
        "alternativ" => [
            "a" => "Ovillig, motvillig",
            "b" => "Böjd åt ett visst håll, hågad",
            "c" => "Okunnig, ovetande"
        ],
        "ratt" => "b"
    ],
    2 => [
        "text" => 'Vad betyder "omfattande"?',
        "alternativ" => [
            "a" => "Vidsträckt, stor",
            "b" => "Tveksam, osäker",
            "c" => "Kortfattad, begränsad"
        ],
        "ratt" => "a"
    ],
    3 => [
        "text" => 'Vad betyder "förtroende"?',
        "alternativ" => [
            "a" => "Misstänksamhet",
            "b" => "Likgiltighet",
            "c" => "Tillit"
        ],
        "ratt" => "c"
    ],
    4 => [
        "text" => 'Vad betyder "avgörande"?',
        "alternativ" => [
            "a" => "Oväsentlig",
            "b" => "Betydelsefull, utslagsgivande",
            "c" => "Tillfällig"
        ],
        "ratt" => "b"
    ]
];

$harRattat = false;
$poang = 0;
$svarFran = []; // sparar vad användaren svarade, så vi kan visa det efter rättning

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $harRattat = true;

    foreach ($fragor as $nr => $fraga) {
        $valtSvar = $_POST["fraga" . $nr] ?? "";
        $svarFran[$nr] = $valtSvar;

        if ($valtSvar === $fraga["ratt"]) {
            $poang++;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synonymer – AYY-HP</title>
    <link rel="stylesheet" href="style.css">
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
            <a href="ovningar.html">Övningar</a>
            <a href="resultat.html">Resultat</a>
            <a href="tips.html">Tips</a>
            <a class="btn btn-outline" href="login.html">Logga in</a>
        </nav>
    </header>

    <section class="page-intro">
        <div class="page-intro-content">
            <h1 class="page-title">Synonymer</h1>
            <p class="page-text">Välj det ord som betyder ungefär samma sak och klicka på "Rätta mina svar".</p>
        </div>
    </section>

    <main>
        <form class="word-quiz" method="post" action="synonymer.php">

            <?php foreach ($fragor as $nr => $fraga): ?>
                <article class="word-question">
                    <h3><?= htmlspecialchars($fraga["text"]) ?></h3>
                    <div class="word-options">

                        <?php foreach ($fraga["alternativ"] as $bokstav => $text):
                            $klass = "word-option";
                            if ($harRattat && $svarFran[$nr] === $bokstav) {
                                $klass .= ($bokstav === $fraga["ratt"]) ? " correct" : " wrong";
                            } elseif ($harRattat && $bokstav === $fraga["ratt"]) {
                                $klass .= " correct";
                            }
                        ?>
                            <label class="<?= $klass ?>">
                                <input type="radio" name="fraga<?= $nr ?>" value="<?= $bokstav ?>"
                                    <?= ($harRattat && $svarFran[$nr] === $bokstav) ? "checked" : "" ?>>
                                <?= htmlspecialchars($text) ?>
                            </label>
                        <?php endforeach; ?>

                    </div>

                    <?php if ($harRattat): ?>
                        <p class="word-feedback">
                            <?= ($svarFran[$nr] === $fraga["ratt"]) ? "Rätt!" : "Fel. Rätt svar är markerat med grönt." ?>
                        </p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>

            <div class="word-quiz-result">
                <?php if ($harRattat): ?>
                    <p><?= $poang ?> av <?= count($fragor) ?> rätt</p>
                <?php else: ?>
                    <p>&nbsp;</p>
                <?php endif; ?>
                <button class="btn btn-primary" type="submit">Rätta mina svar</button>
            </div>

        </form>
    </main>

    <footer class="site-footer">
        <div class="footer-banner">
            <div>
                <h3>Fastnade du på någon fråga?</h3>
                <p>Läs igenom tipsen om prefix och suffix innan du provar igen.</p>
            </div>
            <a class="btn btn-primary" href="tips.html">Se tips</a>
        </div>

        <div class="footer-bottom">
            <span class="logo">AYY-HP</span>
            <a href="login.html">Logga in</a>
            <p>Skolprojekt av AYY</p>
        </div>
    </footer>

</body>

</html>