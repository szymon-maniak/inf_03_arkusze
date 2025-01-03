<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl8.css">
    <title>Nasz sklep komputerowy</title>
</head>
<body>
    <header>
        <section id="menu">
            <a href="index.php">Główna</a>
            <a href="procesory.html">Procesory</a>
            <a href="ram.html">RAM</a>
            <a href="grafika.html">Grafika</a>
        </section>
        <section id="logo">
            <h2>Podzespoły komputerowe</h2>
        </section>
    </header>
    <section id="glowny">
        <h1>Dzisiejsze promocje</h1>
        <table>
            <tr>
                <th>NUMER</th>
                <th>NAZWA PODZESPOŁU</th>
                <th>OPIS</th>
                <th>CENA</th>
            </tr>
            <!-- skrypt -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT id, nazwa, opis, cena FROM `podzespoly` WHERE cena < 1000;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tab = mysqli_fetch_row($odpowiedz)){
                        $text .= "<tr>";
                        $text .= "<td>$tab[0]</td>";
                        $text .= "<td>$tab[1]</td>";
                        $text .= "<td>$tab[2]</td>";
                        $text .= "<td>$tab[3]</td>";
                        $text .= "</tr>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </table>
    </section>
    <footer>
        <section id="pierwszy">
            <img src="scalak.jpg" alt="promocje na procesory">
        </section>
        <section id="drugi">
            <h4>Nasz Sklep Komputerowy</h4>
            <p>Współpracujemy z hurtownią <a href="http://www.edata.pl/" target="_blank">edata</a></p>
        </section>
        <section id="trzeci">
            <p>zadzwoń: 601 602 603</p>
        </section>
        <section id="czwarty">
            <p>Stronę wykonał: Szymon Maniak 5TI</p>
        </section>
    </footer>
</body>
</html>