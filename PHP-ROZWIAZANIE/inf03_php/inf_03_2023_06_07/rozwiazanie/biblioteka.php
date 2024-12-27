<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka</title>
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Małych</h1>
    </header>
    <section id="lewy">
        <h4>Dodaj czytelnika</h4>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="imie"><br>
            nazwisko: <input type="text" name="nazwisko"><br>
            symbol: <input type="number" name="symbol"><br>
            <input type="submit" value="AKCEPTUJ">
        </form>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '' , 'biblioteka');
            if(!$polaczenie){
                exit();
            }
            else{
                @$imie = $_POST['imie'];
                @$nazwisko = $_POST['nazwisko'];
                @$symbol = $_POST['symbol'];

                if(isset($imie)&&isset($nazwisko)&&isset($symbol)){
                    echo "Dodano czytelnika ".$imie." ".$nazwisko;
                    $zapytanie = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');";   
                    mysqli_query($polaczenie, $zapytanie);   
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h6>ul. Czytelników&nbsp;15; Książkowice Małe</h6>
        <a href="mailto:biuro@bib.pl"><p>Czy masz jakieś uwagi?</p></a>
    </section>
    <section id="prawy">
        <h4>Nasi czytelnicy:</h4>
        <ol>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'biblioteka');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT imie, nazwisko FROM `czytelnicy` ORDER BY nazwisko ASC;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $text .= "<li>";
                        $text .= $tablica['imie'];
                        $text .= " ";
                        $text .= $tablica['nazwisko'];
                        $text .= "</li>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <footer>
        <p>Projekt witryny: Szymon Maniak 5TI</p>   
    </footer>
</body>
</html>