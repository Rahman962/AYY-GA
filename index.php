<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYY-HP</title>
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

    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Bygg ett starkare ordförråd.<br>Öva inför högskoleprovet.</h1>
            <p class="hero-text">Gör en övning, få tips om t.ex. prefix och suffix, och prova igen för att se om det blivit bättre.</p>
            <div class="hero-actions">
                <button class="btn btn-primary" onclick="startOvning()">Starta övning</button>
                <a class="btn btn-outline" href="tips.html">Se tips</a>
            </div>
        </div>
    </section>

    <nav class="category-nav">
        <a class="category-link active" href="#">Alla övningar</a>
        <a class="category-link" href="prefix.html">Prefix</a>
        <a class="category-link" href="suffix.php">Suffix</a>
        <a class="category-link" href="synonymer.html">Synonymer</a>
    </nav>

    <main>
        <section class="exercise-section">
            <h2 class="section-title">Snabba övningar</h2>

            <div class="exercise-grid">
                <article class="exercise-card">
                    <h3>Prefix</h3>
                    <p>Träna på hur förstavelser som "o-", "för-" och "miss-" ändrar ett ords betydelse.</p>
                    <span class="exercise-meta">12 frågor · ca 6 min · tips vid fel svar</span>
                    <a class="btn btn-primary" href="prefix.html">Öva nu</a>
                </article>

                <article class="exercise-card">
                    <h3>Suffix</h3>
                    <p>Träna på ändelser som "-het", "-lig" och "-bar" och hur de styr ordklass.</p>
                    <span class="exercise-meta">12 frågor · ca 6 min · tips vid fel svar</span>
                    <a class="btn btn-primary" href="suffix.php">Öva nu</a>
                </article>

                <article class="exercise-card">
                    <h3>Synonymer</h3>
                    <p>Träna på ord med samma eller liknande betydelse som ofta förekommer på HP.</p>
                    <span class="exercise-meta">15 frågor · ca 8 min · tips vid fel svar</span>
                    <a class="btn btn-primary" href="synonymer.html">Öva nu</a>
                </article>
            </div>
        </section>

        <section class="about-section">
            <div class="about-content">
                <h2 class="section-title">Om AYY-HP</h2>
                <p>AYY-HP är ett träningsverktyg för dig som vill bygga ett starkare ordförråd inför
                    högskoleprovets ORD-del. Du gör korta övningar, får konkreta tips när du svarar fel –
                    till exempel om hur prefix och suffix hänger ihop med ett ords betydelse – och kan sedan
                    prova samma övning igen.</p>
                <p>Varje försök sparas, så du kan jämföra ett tidigare resultat med ditt senaste och se om
                    ordförrådet faktiskt har utvecklats. Inga hela provpass och inga videos – bara korta,
                    fokuserade övningar.</p>
                <a class="btn btn-outline" href="resultat.html">Se dina resultat</a>
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