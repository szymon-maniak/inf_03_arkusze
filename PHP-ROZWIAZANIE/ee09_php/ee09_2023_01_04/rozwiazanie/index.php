<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wizytówki</title>
</head>
<body>
    <header>
        <h1>Wizytówki pracowników</h1>
        <form action="index.php" method="post">
            <input type="number" name="przycisk" value="1" min="1" max="9">
            <input type="submit" value="WYŚWIETL">
        </form>
    </header>
    <main>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
            if(!$polaczenie){
                exit();
            }
            else{
                @$id = $_POST['przycisk'];
                $zapytanie = "SELECT id, imie, nazwisko, adres, miasto FROM `pracownicy` WHERE id LIKE '$id';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    echo "<img src='$tablica[0].jpg' alt='pracownik'>";
                    echo "<h2>$tablica[1] $tablica[2]</h2>";
                    echo "<h4>Adres:</h4>";
                    echo "<p>$tablica[3], $tablica[4]</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer id="lewy">
        <img src="obraz.jpg" alt="pracownicy firmy">
    </footer>
    <footer id="srodkowy">
        <p>Autorem wizytownika jest: Szymon Maniak 5TI</p>
        <a href="http://agencjareklamowa543.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>
    <footer id="prawy">
        <p>Osoby proszone o podpisanie dokumentu RODO:</p>
        <ol>
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'firma');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT imie, nazwisko FROM `pracownicy` WHERE czyRODO LIKE 0;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        echo "<li>$tablica[0] $tablica[1]</li>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </footer>
</body>
</html>