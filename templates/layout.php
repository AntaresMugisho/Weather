<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Weather</title>
    <meta name="description" content="Soyez au courant de la météo pour demeurer en harmonie avec la nature !">
</head>
<body>
    <header>
        <nav>
            <a href="#" class="nav-brand">Weather<span>App</span></a>
            <a href="https://github.com/AntaresMugisho/Weather" class="nav-link">About</a>
            <a href="https://github.com/AntaresMugisho/Weather" class="humburger">i</a>
        </nav>

        <div class="hero">
            <h2 class="main-title">Découvrez la météo pour demeurer en harmonie avec la nature ! </h2>
        </div>
    </header>

    <main>
        <?= $content;?>
    </main>

    <footer>
        <p class="copyright">&copy; <span class="years">2022</span> - WeatherApp</p>
        <p class="creative-mind" >&bull;CreativeMind</p>
    </footer>
    
    <script src="../assets/js/app.js"></script>
</body>
</html>