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
    <aside>
        <h2>Kategorie ogłoszeń</h2>
        <ol>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Filmy</li>
        </ol>
        <img src="ksiazki.jpg" alt="Kupię / sprzedam książkę">
        <table>
            <tr>
                <td>Liczba ogłoszeń</td>
                <td>Cena ogłoszenia</td>
                <td>Bonus</td>
            </tr>
            <tr>
                <td>1 - 10</td>
                <td>1 PLN</td>
                <td rowspan="3">Subkrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
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
    </aside>
    <section id="glowny">
        <h2>Ogłoszenia kategorii książki</h2>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'ogloszenia');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie_1 = "SELECT id, tytul, tresc FROM `ogloszenie` WHERE kategoria = 1;";
                $zapytanie_2 = "SELECT telefon FROM `ogloszenie` JOIN uzytkownik ON ogloszenie.uzytkownik_id = uzytkownik.id;";
                $odpowiedz_1 = mysqli_query($polaczenie, $zapytanie_1);
                $odpowiedz_2 = mysqli_query($polaczenie, $zapytanie_2);
                $text = " ";
                while($tablica_1 = mysqli_fetch_array($odpowiedz_1)){
                    $text .= "<h3>".$tablica_1['id']." ".$tablica_1['tytul']."</h3>";
                    $text .= "<p>".$tablica_1['tresc']."</p>";
                    if($tablica_2 = mysqli_fetch_array($odpowiedz_2)){
                        $text .= "<p>"."telefon kontaktowy ".$tablica_2['telefon']."</p>";
                    }
                }
                echo $text;
                mysqli_close($polaczenie);
            }
        ?>
    </section>
    <footer>
        Portal ogłoszeniowy opracował: Szymon Maniak 5TI
    </footer>
</body>
</html>