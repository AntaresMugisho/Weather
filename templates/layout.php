<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title> Weather </title>
    <meta name="description" content="Daily weather report app !">
</head>
<body>

    <header>
        <nav>
            <a href="#" class="nav-brand">Weather<span>App</span></a>
            <a href="#" class="nav-link">About</a>
            <a href="#" class="humburger">i</a>
        </nav>

        <div class="hero">
            <h2 class="main-title">Découvrez la météo pour demeurer en harmonie avec la nature ! </h2>
        </div>
    </header>

    <main>
        <?php 
            require "./homepage.php";
        ?>

    </main>

    <footer>
        <p class="copyright">&copy; 2022 - Tous droits reservés</p>
        <p class="creative-mind" >&bull;CreativeMind</p>
    </footer>
    
</body>
</html>