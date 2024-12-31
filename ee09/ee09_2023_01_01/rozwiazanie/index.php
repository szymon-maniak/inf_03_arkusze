<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sekretariat</title>
</head>
<body>
    <section id="lewy">
        <h1>Akta Pracownicze</h1>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM `pracownicy` WHERE id LIKE 2";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tab = mysqli_fetch_row($odpowiedz)){
                    $text .= "<h3>dane</h3>";
                    $text .= "<p>$tab[0] $tab[1]</p>";
                    $text .= "<hr>";
                    $text .= "<h3>adres</h3>";
                    $text .= "<p>$tab[2]</p>";
                    $text .= "<p>$tab[3]</p>";
                    $text .= "<hr>";
                        if($tab[4] == 1){
                            $text .= "<p>RODO: podpisano</p>";
                        }
                        else if($tab[4] == 0){
                            $text .= "<p>RODO: niepodpisano</p>";
                        }

                        if($tab[5] == 1){
                            $text .= "<p>Badania: aktualne</p>";
                        }
                        else if($tab[5] == 0){
                            $text .= "<p>Badania: nieaktualne</p>";
                        }
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
        <hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <p>
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT COUNT(*) FROM `pracownicy` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_row($odpowiedz)){
                        echo "$tab[0]";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </p>
    </section>
    <section id="prawy">
        <!-- skrypt 3 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie_1 = "SELECT id, imie, nazwisko FROM `pracownicy` WHERE id LIKE 2;";
                $odpowiedz_1 = mysqli_query($polaczenie, $zapytanie_1);
                $text_1 = " ";
                while($tab_1 = mysqli_fetch_row($odpowiedz_1)){
                    $obraz = "$tab_1[0].jpg";
                    $text_1 .= "<img src='$obraz' alt='pracownik'>";
                    $text_1 .= "<h2>$tab_1[1] $tab_1[2]</h2>";
                }
                echo $text_1;

                $zapytanie_2 = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM `pracownicy` JOIN stanowiska ON pracownicy.stanowiska_id = stanowiska.id WHERE pracownicy.id LIKE 2;";
                $odpowiedz_2 = mysqli_query($polaczenie, $zapytanie_2);
                $text_2 = " ";
                while($tab_2 = mysqli_fetch_row($odpowiedz_2)){
                    $text_2 .= "<h4>$tab_2[1]</h4>";
                    $text_2 .= "<h5>$tab_2[2]</h5>";
                }
                echo $text_2;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        Autorem aplikacji jest: Szymon Maniak 5TI
        <ol>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ol>
    </footer>
</body>
</html>