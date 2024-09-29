<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Kwiaty</title>
</head>
<body>
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>
    <nav>
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html"></a>Strona główna</li>
            <li><a href="http://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
            <li>
                <a href="znajdz.php">Znajdź kwiaciarnię</a>
                <ul>
                    <li>w Warszawie</li>
                    <li>w Malborku</li>
                    <li>w Poznaniu</li>
                </ul>
            </li>
        </ol>
    </nav>
    <main>
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method="post">
            Podaj nazwę miasta: <input type="text" name="miato"><br>
            <input type="submit" value="SPRAWDŹ">
        </form>
    </main>
    <footer>
        <p>Stronę opracował: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>