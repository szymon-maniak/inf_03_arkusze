<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM `ryby` JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj LIKE 3;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "<li>$tab[0] pływa w rzece $tab[1], $tab[2]</li>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia LIKE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "<tr>";
                            echo "<td>$tab[0]</td>";
                            echo "<td>$tab[1]</td>";
                            echo "<td>$tab[2]</td>";
                        echo "</tr>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </table>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>