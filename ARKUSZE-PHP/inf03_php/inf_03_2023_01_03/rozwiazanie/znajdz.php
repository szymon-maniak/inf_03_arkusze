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
            <li><a href="index.html">Strona główna</a></li>
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
    <section id="glowny">
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method="post">
            Podaj nazwę miasta: <input type="text" name="miasto"><br>
            <input type="submit" value="SPRAWDŹ">
        </form>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
            if(!$polaczenie){
                exit();
            }
            else{
                @$miasto = $_POST['miasto'];
                $zapytanie = "SELECT nazwa, ulica FROM `kwiaciarnie` WHERE miasto = '$miasto';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $text .= "<h3>".$tablica['nazwa'].",".$tablica['ulica']."</h3>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <p>Stronę opracował: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>