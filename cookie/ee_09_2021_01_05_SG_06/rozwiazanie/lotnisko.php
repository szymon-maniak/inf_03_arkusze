<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Port Lotniczy</title>
</head>
<body>
    <div id="header1">
        <img src="zad5.png" alt="logo lotnisko">
    </div>
    <div id="header2">
        <h1>Przyloty</h1>
    </div>
    <div id="header3">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </div>
    <div id="main">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '' , 'egzamin');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM `przyloty` ORDER BY czas ASC;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "<tr>";
                            echo "<td>$tab[0]</td>";
                            echo "<td>$tab[1]</td>";
                            echo "<td>$tab[2]</td>";
                            echo "<td>$tab[3]</td>";
                        echo "</tr>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </table>
    </div>
    <div id="footer1">
        <!-- skrypt 2 -->
        <?php
            if(!isset($_COOKIE['ciasteczko'])){
                setcookie('ciasteczko', 1, time() + 7200);
                echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
            }
            else{
                echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
            }
        ?>
    </div>
    <div id="footer2">
        Autor: Szymon Maniak 5TI
    </div>
</body>
</html>