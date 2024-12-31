<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Ogłoszenia drobne</title>
</head>
<body>
    <header>
        <h2>Ogłoszenia drobne</h2>
    </header>
    <section id="lewy">
        <h2>Ogłoszeniodawcy</h2>
        <!-- skrypt -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'ogloszenia');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie_1 = "SELECT id, imie, nazwisko, email FROM `uzytkownik` WHERE id < 4;";
                $odpowiedz_1 = mysqli_query($polaczenie, $zapytanie_1);
                while($tablica_1 = mysqli_fetch_array($odpowiedz_1)){ 
                    $zapytanie_2 = "SELECT tytul FROM `ogloszenie` WHERE uzytkownik_id LIKE $tablica_1[0] LIMIT 1;";
                    $odpowiedz_2 = mysqli_query($polaczenie, $zapytanie_2);
                    $tablica_2 = mysqli_fetch_array($odpowiedz_2);
                    echo "<h3>$tablica_1[0] $tablica_1[1] $tablica_1[2]</h3>";
                    echo "<p>$tablica_1[3]</p>";
                    echo "<p>Ogłoszenie: $tablica_2[0]</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <h2>Nasze kategorie</h2>
        <ol>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Multimedia</li>
        </ol>
        <img src="ksiazki.jpg" alt="uwolnij swoją książkę">
        <table>
            <tr>
                <td>Ile?</td>
                <td>Koszt</td>
                <td>Promocja</td>
            </tr>
            <tr>
                <td>1 - 40</td>
                <td>1,20 PLN</td>
                <td rowspan="2">Subskrybuj newsletter upust 0,30 PLN na ogłoszenie</td>
            </tr>
            <tr>
                <td>41 i więcej</td>
                <td>0,70 PLN</td>
            </tr>
        </table>
    </section>
    <footer>
        Portal ogłoszenia drobne opracował: Szymon Maniak 5TI
    </footer>
</body>
</html>