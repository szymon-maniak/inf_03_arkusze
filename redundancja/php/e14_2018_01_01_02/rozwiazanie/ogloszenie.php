<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl1.css">
    <title>Portal ogłoszeniowy</title>
</head>
<body>
    <header>
        <h1>Portal Ogłoszeniowy</h1>
    </header>
    <div id="lewy">
        <h2>Kategorie ogłoszeń</h2>
        <ol>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Filmy</li>
        </ol>
        <img src="ksiazki.jpg" alt="Kupię/sprzedam książkę">
        <table>
            <tr>
                <td>Liczba ogłoszeń</td>
                <td>Cena ogłoszenia</td>
                <td>Bonus</td>
            </tr>
            <tr>
                <td>1 - 10</td>
                <td>1 PLN</td>
                <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
            </tr>
            <tr>
                <td>11 - 50</td>
                <td>0,80 PLN</td>
            </tr>
            <tr>
                <td>51 i więcej</td>
                <td>0,60 PLN</td>
            </tr>
        </table>
    </div>
    <div id="prawy">
        <h2>Ogłoszenia kategorii książki</h2>
        <!-- skrypt -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'ogloszenia');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie1 = "SELECT id, tytul, tresc FROM `ogloszenie` WHERE kategoria LIKE 1;";
                $zapytanie2 = "SELECT uzytkownik.telefon FROM `ogloszenie` JOIN uzytkownik ON ogloszenie.uzytkownik_id = uzytkownik.id WHERE ogloszenie.id;";
                $odpowiedz1 = mysqli_query($polaczenie, $zapytanie1);
                $odpowiedz2 = mysqli_query($polaczenie, $zapytanie2);
                while($tablica1 = mysqli_fetch_row($odpowiedz1)){
                    $tablica2 = mysqli_fetch_row($odpowiedz2);
                    echo "<h3>$tablica1[0] $tablica1[1]</h3>";
                    echo "<p>$tablica1[2]</p>";
                    echo "<p>telefon kontaktowy: $tablica2[0]</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <footer>
        Portal ogłoszeniowy opracował: Szymon Maniak 5TI
    </footer>
</body>
</html>