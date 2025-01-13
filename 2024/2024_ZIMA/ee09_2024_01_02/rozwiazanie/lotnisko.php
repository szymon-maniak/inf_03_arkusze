<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Port Lotniczy</title>
</head>
<body>
    <header>
        <section id="pierwszy">
            <img src="zad5.png" alt="logo lotnisko">
        </section>
        <section id="drugi">
            <h1>Przyloty</h1>
        </section>
        <section id="trzeci">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt">Pobierz...</a>
        </section>
    </header>
    <article id="glowny">
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
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "<tr>";
                        echo "<td>$tab[0]</td>";
                        echo "<td>$tab[1]</td>";
                        echo "<td>$tab[2]</td>";
                        echo "<td>$tab[3]</td>";
                        echo "</tr>";
                    }
                    mysqli_close($polaczenie);
                }
            ?>
        </table>
    </article>
    <footer>
        <section id="stopka1">

        </section>
        <section id="stopka2">
            Autor: Szymon Maniak 5TI
        </section>
    </footer>
</body>
</html>