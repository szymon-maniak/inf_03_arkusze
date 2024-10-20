<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Rozgrywki futbolowe</title>
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>
    <section id="mecze">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM `rozgrywka` WHERE zespol1 LIKE 'EVG';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $zespol1 = $tablica['zespol1'];
                    $zespol2 = $tablica['zespol2'];
                    $wynik = $tablica['wynik'];
                    $data_rozgrywki = $tablica['data_rozgrywki'];

                    $text .= "<section class='rozgrywki'>";
                    $text .= "<h3>$zespol1 - $zespol2</h3>";
                    $text .= "<h4>$wynik</h4>";
                    $text .= "<p>w dniu: $data_rozgrywki</p>";
                    $text .= "</section>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <main>
        <h2>Reprezentacja Polski</h2>
    </main>
    <section id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
        <form action="futbol.php" method="post">
            <input type="number" name="pole">
            <input type="submit" value="Sprawdź">
            <ul>
                <!-- skrypt 2 -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        if(!empty($_POST['pole'])){
                            $pole = $_POST['pole'];
                            $zapytanie = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pole;";
                            $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                            $text = " ";
                            while($tablica = mysqli_fetch_array($odpowiedz)){
                                $imie = $tablica['imie'];
                                $nazwisko = $tablica['nazwisko'];

                                $text .= "<li><p>$imie $nazwisko</p></li>";
                            }
                            echo $text;
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
            </ul>
        </form>
    </section>
    <section id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: Szymon Maniak 5TI</p>
    </section>
</body>
</html>