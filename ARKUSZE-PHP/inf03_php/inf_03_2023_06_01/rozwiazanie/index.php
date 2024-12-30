<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep dla uczniów</title>
</head>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <section id="lewy">
        <h2>Taniej o 30%</h2>
        <ol>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT nazwa FROM `towary` WHERE promocja like 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        $text .= "<li>$tablica[0]</li>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <section id="srodkowy">
        <h2>Sprawdź cenę</h2>
        <form action="index.php" method="post">
            <select name="towar">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <input type="submit" value="SPRAWDŹ">
        </form>
        <div id="skrypt_2">
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
                if(!$polaczenie){
                    exit();
                }
                else{
                    @$towar = $_POST['towar'];
                    $zapytanie = "SELECT cena FROM `towary` WHERE nazwa LIKE '$towar';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        $cena = $tablica[0] * 0.7;
                        $text .= "cena regularna: $tablica[0]<br>";
                        $text .= "cena w promocji 30%: $cena";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </div>
    </section>
    <section id="prawy">
        <h2>Kontakt</h2>
        <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja.png" alt="promocja">
    </section>
    <footer>
        <h4>Autor strony: Szymon Maniak 5TI</h4>
    </footer>
</body>
</html>