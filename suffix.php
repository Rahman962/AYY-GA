<?php
session_start();

$fragor = [
    [
        'fraga' => 'Vilket ord betyder ungefär "möjlig att göra"?',
        'alternativ' => ['görhet', 'görbar', 'görlig', 'görning'],
        'ratt' => 1,
        'tips' => 'Suffixet -bar betyder ofta "möjlig att …" (t.ex. ätbar, läsbar).'
    ],
    [
        'fraga' => 'Vad betyder ordet "vänlighet"?',
        'alternativ' => ['En person som är vän', 'Egenskapen att vara vänlig', 'Att bli vän med någon', 'En plats för vänner'],
        'ratt' => 1,
        'tips' => 'Suffixet -het gör ofta adjektiv till substantiv (klarhet, trygghet).'
    ],
    [
        'fraga' => 'Vilket ord passar? "Boken är mycket ___ att läsa."',
        'alternativ' => ['läsning', 'läsbar', 'läshet', 'läselse'],
        'ratt' => 1,
        'tips' => '-bar = möjlig att göra. Läsbar = som går att läsa.'
    ],
    [
        'fraga' => 'Vad är skillnaden mellan "rörelse" och "rörlig"?',
        'alternativ' => ['Rörelse = substantiv, rörlig = adjektiv', 'De betyder samma sak', 'Rörelse är ett verb', 'Rörlig betyder utan rörelse'],
        'ratt' => 0,
        'tips' => '-else bildar substantiv, -lig bildar adjektiv.'
    ],
    [
        'fraga' => '"Möjlighet" – vilket suffix används och vad gör det?',
        'alternativ' => ['-lig: gör ordet till adjektiv', '-het: gör adjektivet möjlig till substantiv', '-bar: betyder kan göras', '-ning: bildar verb'],
        'ratt' => 1,
        'tips' => '-het tar ett adjektiv och skapar ett substantiv som beskriver egenskapen.'
    ],
    [
        'fraga' => 'Vad betyder "användbar"?',
        'alternativ' => ['Någon som använder något', 'Något som går att använda', 'Handlingen att använda', 'En typ av användare'],
        'ratt' => 1,
        'tips' => '-bar = som kan … / möjlig att …'
    ],
    [
        'fraga' => 'Vilket suffix gör ofta verb till substantiv som beskriver processen?',
        'alternativ' => ['-lig', '-bar', '-ning', '-ig'],
        'ratt' => 2,
        'tips' => '-ning bildar ofta substantiv från verb: träning, övning, förbättring.'
    ],
    [
        'fraga' => '"Tydlig" – vilken ordklass och vilket suffix?',
        'alternativ' => ['Adjektiv, suffixet -lig', 'Substantiv, suffixet -het', 'Verb, suffixet -a', 'Adverb, suffixet -t'],
        'ratt' => 0,
        'tips' => '-lig bildar ofta adjektiv (tydlig, vänlig, farlig).'
    ],
    [
        'fraga' => 'Vilket ord betyder "det att man förbättrar något"?',
        'alternativ' => ['förbättrig', 'förbättring', 'förbättrbar', 'förbättrhet'],
        'ratt' => 1,
        'tips' => '-ning bildar substantiv från verb: förbättring, träning.'
    ],
    [
        'fraga' => '"Läsbarhet" – vad beskriver ordet?',
        'alternativ' => ['En person som läser mycket', 'Egenskapen att något är lätt att läsa', 'Handlingen att läsa', 'En typ av bok'],
        'ratt' => 1,
        'tips' => '-bar + -het → läsbarhet = egenskapen att vara läsbar.'
    ],
    [
        'fraga' => 'Vilket ord passar? "Hon har en stark ___ för rättvisa."',
        'alternativ' => ['känsla', 'känslig', 'kännbar', 'kännhet'],
        'ratt' => 0,
        'tips' => 'känsla är substantiv; känslig är adjektiv.'
    ],
    [
        'fraga' => 'Vad betyder ungefär "görbar"?',
        'alternativ' => ['Någon som gör mycket', 'Något som går att göra', 'Handlingen att göra', 'En typ av gärning'],
        'ratt' => 1,
        'tips' => '-bar = möjlig att … / som kan göras.'
    ],
];

$antal = count($fragor);

if (isset($_GET['start'])) {
    $_SESSION['nr'] = 0;
    $_SESSION['poang'] = 0;
    $_SESSION['svarat'] = false;
    $_SESSION['valt'] = null;
    header('Location: suffix.php');
    exit;
}

if (isset($_POST['svar']) && isset($_SESSION['nr'])) {
    $nr = $_SESSION['nr'];
    if ($nr < $antal && empty($_SESSION['svarat'])) {
        $valt = (int) $_POST['svar'];
        $_SESSION['valt'] = $valt;
        $_SESSION['svarat'] = true;
        if ($valt === $fragor[$nr]['ratt']) {
            $_SESSION['poang']++;
        }
    }
}

if (isset($_POST['nasta']) && !empty($_SESSION['svarat'])) {
    $_SESSION['nr']++;
    $_SESSION['svarat'] = false;
    $_SESSION['valt'] = null;
    if ($_SESSION['nr'] >= $antal) {
        header('Location: suffix.php?klar=1');
        exit;
    }
    header('Location: suffix.php');
    exit;
}

$startad = isset($_SESSION['nr']);
$klar = isset($_GET['klar']);
$nr = $startad ? (int) $_SESSION['nr'] : 0;
$poang = isset($_SESSION['poang']) ? (int) $_SESSION['poang'] : 0;
$svarat = !empty($_SESSION['svarat']);
$valt = isset($_SESSION['valt']) ? $_SESSION['valt'] : null;
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suffix - AYY-HP</title>
    <link rel="stylesheet" href="suffix.css">
</head>

<body>

    <header class="site-header">
        <a class="logo" href="index.php">AYY-HP</a>

        <svg class="menu-icon" onclick="document.getElementById('mainNav').classList.toggle('open')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
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

    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Suffix</h1>
            <p class="hero-text">Träna på ändelser som "-het", "-lig" och "-bar" och hur de styr ordklass.</p>
        </div>
    </section>

    <nav class="category-nav">
        <a class="category-link" href="index.php">Alla övningar</a>
        <a class="category-link" href="prefix.html">Prefix</a>
        <a class="category-link active" href="suffix.php">Suffix</a>
        <a class="category-link" href="synonymer.html">Synonymer</a>
    </nav>

    <main>
        <section class="exercise-section">
            <h2 class="section-title">Suffix-övning</h2>

            <?php if ($klar): ?>
                <div class="quiz-box">
                    <h3 class="quiz-result-title">Resultat</h3>
                    <?php
                    $procent = round(($poang / $antal) * 100);
                    if ($procent == 100) {
                        $msg = "Perfekt! Du fick $poang av $antal rätt ($procent %).";
                    } elseif ($procent >= 75) {
                        $msg = "Bra jobbat! Du fick $poang av $antal rätt ($procent %).";
                    } elseif ($procent >= 50) {
                        $msg = "Okej resultat – $poang av $antal rätt ($procent %). Öva gärna igen.";
                    } else {
                        $msg = "Du fick $poang av $antal rätt ($procent %). Titta på tippsen och prova igen!";
                    }
                    ?>
                    <p class="quiz-desc"><?php echo $msg; ?></p>
                    <a class="btn btn-primary" href="suffix.php?start=1">Öva igen</a>
                    <a class="btn btn-outline" href="resultat.html">Spara resultat</a>
                </div>

            <?php elseif (!$startad): ?>
                <div class="quiz-box">
                    <p class="quiz-info"><?php echo $antal; ?> frågor · ca 6 min · tips vid fel svar</p>
                    <p class="quiz-desc">Du får en fråga i taget. Välj ett alternativ och gå vidare till nästa.</p>
                    <a class="btn btn-primary" href="suffix.php?start=1">Starta övning</a>
                </div>

            <?php else: ?>
                <?php $q = $fragor[$nr]; ?>
                <div class="quiz-box">
                    <div class="quiz-progress">
                        <span>Fråga <?php echo ($nr + 1); ?> av <?php echo $antal; ?></span>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo round((($nr + ($svarat ? 1 : 0)) / $antal) * 100); ?>%;"></div>
                        </div>
                    </div>

                    <p class="quiz-question"><?php echo htmlspecialchars($q['fraga']); ?></p>

                    <?php if (!$svarat): ?>
                        <form method="post" class="quiz-options">
                            <?php foreach ($q['alternativ'] as $i => $text): ?>
                                <button type="submit" name="svar" value="<?php echo $i; ?>"
                                    class="quiz-option-btn color-<?php echo $i; ?>">
                                    <?php echo htmlspecialchars($text); ?>
                                </button>
                            <?php endforeach; ?>
                        </form>
                    <?php else: ?>
                        <div class="quiz-options">
                            <?php foreach ($q['alternativ'] as $i => $text): ?>
                                <?php
                                $klass = 'quiz-option-btn color-' . $i;
                                if ($i === $q['ratt']) {
                                    $klass .= ' correct';
                                } elseif ($i === $valt) {
                                    $klass .= ' wrong';
                                } else {
                                    $klass .= ' dimmed';
                                }
                                ?>
                                <button type="button" class="<?php echo $klass; ?>" disabled>
                                    <?php echo htmlspecialchars($text); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <?php if ($valt === $q['ratt']): ?>
                            <p class="quiz-feedback ok">Rätt svar!</p>
                        <?php else: ?>
                            <p class="quiz-feedback fail">Fel svar</p>
                            <p class="quiz-tip">Tips: <?php echo htmlspecialchars($q['tips']); ?></p>
                        <?php endif; ?>

                        <form method="post" class="quiz-nav">
                            <button type="submit" name="nasta" value="1" class="btn btn-primary">
                                <?php echo ($nr + 1 >= $antal) ? 'Se resultat' : 'Nästa fråga'; ?>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </section>

        <section class="about-section">
            <div class="about-content">
                <h2 class="section-title">Om suffix</h2>
                <p>Suffix är ändelser som sätts efter ordstammen och påverkar både betydelse och ordklass. På högskoleprovets ORD-del dyker de upp ofta.</p>
                <p><strong>-het</strong> gör adjektiv till substantiv (vänlig → vänlighet). <strong>-lig</strong> bildar adjektiv (fara → farlig). <strong>-bar</strong> betyder ofta "möjlig att …" (läsa → läsbar). <strong>-ning</strong> bildar substantiv från verb (träna → träning).</p>
                <a class="btn btn-outline" href="tips.html">Fler tips</a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-banner">
            <div>
                <h3>Håll koll på din utveckling.</h3>
                <p>Se dina sparade resultat och jämför övning för övning.</p>
            </div>
            <a class="btn btn-primary" href="resultat.html">Se resultat</a>
        </div>

        <div class="footer-bottom">
            <span class="logo">AYY-HP</span>
            <a href="login.html">Logga in</a>
            <p>Skolprojekt av AYY</p>
        </div>
    </footer>

</body>
</html>