<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Ważenie samochodów ciężarowych</title>
</head>
<body>
    <header id="pierwszy">
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </header>
    <header id="drugi">
        <img src="obraz1.png" alt="waga">
    </header>
    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT ulica FROM `lokalizacje` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $ulica = $tablica['ulica'];
                        $text .= "<li>";
                        $text .= "ulica $ulica";
                        $text .= "</li>";
                    }
                    echo $text;
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
            <thead>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzien</th>
                    <th>czas</th>
                </tr>
            </thead>
            <tbody>
                <!-- skrypt 2 -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        $zapytanie = "SELECT wagi.rejestracja, wagi.waga, wagi.dzien, wagi.czas, lokalizacje.ulica FROM wagi JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE wagi.waga > 5;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        $text = " ";
                        while($tablica = mysqli_fetch_array($odpowiedz)){
                            $rejestracja = $tablica['rejestracja'];
                            $waga = $tablica['waga'];
                            $dzien = $tablica['dzien'];
                            $czas = $tablica['czas'];
                            $ulica = $tablica['ulica'];

                            $text .= "<tr>";
                            $text .= "<td>$rejestracja</td>";
                            $text .= "<td>$ulica</td>";
                            $text .= "<td>$waga</td>";
                            $text .= "<td>$dzien</td>";
                            $text .= "<td>$czas</td>";
                            $text .= "</tr>";
                        }
                        echo $text;
                    }
                    mysqli_close($polaczenie);
                ?>
            </tbody>
        </table>
        <!-- skrypt 3 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wazenietirow');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "INSERT INTO wagi (lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5, FLOOR(1 + RAND() * 10), 'DW12345', CURRENT_DATE, CURRENT_TIME);";
                mysqli_query($polaczenie, $zapytanie);
                header("refresh:10");
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <img src="obraz2.jpg" alt="tir">
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>