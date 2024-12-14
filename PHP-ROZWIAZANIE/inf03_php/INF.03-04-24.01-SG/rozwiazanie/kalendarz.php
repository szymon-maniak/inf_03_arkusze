<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Zadania na lipiec</title>
</head>
<body>
    <header id="baner1">
        <img src="logo1.png" alt="lipiec">
    </header>
    <header id="baner2">
        <h1>TERMINARZ</h1>
        <p>
            najbliższe zadania:
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'terminarz');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT DISTINCT(wpis) FROM `zadania` WHERE dataZadania >='2020-07-01' AND dataZadania <= '2020-07-07' AND wpis NOT LIKE '';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo " $tab[0];";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </p>
    </header>
    <main>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'terminarz');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT dataZadania, wpis FROM `zadania` WHERE miesiac LIKE 'lipiec';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tab = mysqli_fetch_array($odpowiedz)){
                    echo "<div class='kalendarz'>";
                        echo "<h6>$tab[0]</h6>";
                        echo "<p>$tab[1]</p>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>