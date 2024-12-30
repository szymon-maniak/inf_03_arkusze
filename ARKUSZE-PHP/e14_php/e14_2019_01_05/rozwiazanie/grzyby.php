<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Grzybobranie</title>
</head>
<body>
    <header>
        <section id="miniatura">
            <a href="borowik.jpg"><img src="borowik-miniaturka.jpg" alt="Grzybobranie"></a>
        </section>
        <section id="tytulowe">
            <h1>Idziemy na grzyby!</h1>
        </section>
    </header>
    <section id="lewy">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT nazwa_pliku, potoczna FROM `grzyby`;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwa_pliku = $tablica['nazwa_pliku'];
                    $potoczna = $tablica['potoczna'];
                    echo "<img src='$nazwa_pliku' title='$potoczna'>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <h2>Grzyby jadalne</h2>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT nazwa, potoczna FROM `grzyby` WHERE jadalny = 1;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwa = $tablica['nazwa'];
                    $potoczna = $tablica['potoczna'];
                    echo "<p>$nazwa ($potoczna)</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
        <h2>Polecamy do sosów</h2>
        <!-- skrypt 3 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa FROM `grzyby` JOIN rodzina ON grzyby.rodzina_id = rodzina.id WHERE grzyby.potrawy_id = 1;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                echo "<ol>";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $nazwa_grzyba = $tablica[0];
                    $nazwa_potoczna = $tablica[1];
                    $nazwa_rodziny = $tablica[2];
                    echo "<li>$nazwa_grzyba($nazwa_potoczna), rodzina: $nazwa_rodziny</li>";
                }
                echo "</ol>";
            }
            mysqli_close($polaczenie);
            ?>        
    </section>
    <footer>
        <p>Autor: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>