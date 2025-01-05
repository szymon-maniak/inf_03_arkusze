<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Ważenie samochodów ciężarowych</title>
</head>
<body>
    <header>
        <section id="baner1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section id="baner2">
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <main>
        <section id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <!-- skrypt 1 -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
                    if(!$polaczenie){
                        exit();
                    } else{
                        $zapytanie = "SELECT ulica FROM `lokalizacje` WHERE 1;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        $ile = mysqli_num_rows($odpowiedz);
                        for ($i=0; $i < $ile; $i++) { 
                            $tab = mysqli_fetch_array($odpowiedz);
                            echo "<li>$tab[0]</li>";
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id="srodkowy">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <!-- skrypt 2 -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
                    if(!$polaczenie){
                        exit();
                    } else{
                        $zapytanie = "SELECT rejestracja, waga, dzien, czas, lokalizacje.ulica FROM `wagi` JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE wagi.waga > 5;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        $ile = mysqli_num_rows($odpowiedz);
                        for ($i=0; $i < $ile; $i++) { 
                            $tab = mysqli_fetch_array($odpowiedz);
                            echo "<tr>";
                            echo "<td>$tab[0]</td>";
                            echo "<td>$tab[4]</td>";
                            echo "<td>$tab[1]</td>";
                            echo "<td>$tab[2]</td>";
                            echo "<td>$tab[3]</td>";
                            echo "</tr>";
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
            </table>
            <!-- skrypt 3 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
                if(!$polaczenie){
                    exit();
                } else{
                    $zapytanie = "INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5', FLOOR(1+RAND()*10),'DW12345', CURRENT_DATE, CURRENT_TIME);";
                    mysqli_query($polaczenie, $zapytanie);
                    header("refresh: 10");
                }
                mysqli_close($polaczenie);
            ?>
        </section>
        <section id="prawy">
            <img src="obraz2.jpg" alt="tir">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>