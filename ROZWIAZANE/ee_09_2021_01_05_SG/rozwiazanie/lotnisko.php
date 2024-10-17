<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Port Lotniczy</title>
</head>
<body>
    <header id="pierwszy">
        <img src="zad5.png" alt="logo lotnisko">
    </header>
    <header id="drugi">
        <h1>Przyloty</h1>
    </header>
    <header id="trzeci">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt">Pobierz...</a>
    </header>
    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM `przyloty` ORDER BY czas ASC;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $text .= "<tr>";
                        $text .= "<td>".$tablica['czas']."</td>";
                        $text .= "<td>".$tablica['kierunek']."</td>";
                        $text .= "<td>".$tablica['nr_rejsu']."</td>";
                        $text .= "<td>".$tablica['status_lotu']."</td>";
                        $text .= "</tr>";
                    }
                    echo $text;
                    mysqli_close($polaczenie);
                }
            ?>
        </table>
    </main>
    <footer id="stopka_1">
        <?php
            if(isset($_COOKIE['ciasteczko'])){
                echo "<p><i>Witaj ponownie na stronie lotnisko</i></p>";
            }
            else{
                setcookie('ciasteczko', 1, time() + 7200 );
                echo "<p><i>Dzień dobry! Strona lotnisko używa ciasteczek</i></p>";
            }
        ?>
    </footer>
    <footer id="stopka_2">
        Autor: Szymon Maniak 5TI
    </footer>
</body>
</html>