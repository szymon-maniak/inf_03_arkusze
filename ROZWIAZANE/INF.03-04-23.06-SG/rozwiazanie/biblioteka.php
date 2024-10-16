<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka publiczna</title>
</head>
<body>
    <div id="baner">
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </div>
    <div id="lewy">
        <h3>Polecamy dzieła autorów</h3>
        <ol>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'biblioteka');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT `imie`, `nazwisko` FROM `autorzy` ORDER BY nazwisko;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = "";
                    while($row = mysqli_fetch_array($odpowiedz)){
                        $text .= '<li>';
                        $text .= $row['imie'];
                        $text .= " ";
                        $text .= $row['nazwisko'];
                        $text .= '</li>';
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </div>
    <div id="srodkowy">
        <h3>ul. Czytelnicza 25, Ksiąkowice&nbsp;Wielkie</h3>
        <a href="mailto:sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
        <img src="biblioteka.png" alt="książki">
    </div>
    <div id="prawy_1">
        <h3>Dodaj czytelnika</h3>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="imie"><br>
            nazwisko: <input type="text" name="nazwisko"><br>
            symbol: <input type="number" name="symbol"><br>
            <input type="submit" value="DODAJ">
        </form>
    </div>
    <div id="prawy_2">
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'biblioteka');
            if(!$polaczenie){
                exit();
            }
            else{
                @$imie = $_POST["imie"];
                @$nazwisko = $_POST["nazwisko"];
                @$symbol = $_POST["symbol"];
                if(isset($imie)&&isset($nazwisko)&&isset($symbol)){
                    echo "Czytelnik ".$imie." ".$nazwisko." został(a) dodany do bazy danych";

                    $zapytanie = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <div style="clear: both;"></div>
    <div id="stopka">
        <p>Projekt strony: Szymon Maniak 5TI</p>
    </div>
</body>
</html>