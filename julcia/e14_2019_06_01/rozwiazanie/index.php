<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep papierniczy</title>
</head>
<body>
    <header>
        <h1>W naszym sklepie internetowym kupisz najtaniej</h1>
    </header>
    <section id="lewy">
        <h3>Promocja 15% obejmuje artykuły:</h3>
        <ul>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT nazwa FROM `towary` WHERE promocja = 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $nazwa = $tablica['nazwa'];
                        echo "<li>$nazwa</li>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </ul>
    </section>
    <section id="srodkowy">
        <h3>Cena wybranego artykułu w promocji</h3>
        <form action="index.php" method="post">
            <select name="lista">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <input type="submit" value="Wybierz">
        </form>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'sklep');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['lista'])){
                    $lista = $_POST['lista'];
                    $zapytanie = "SELECT cena FROM `towary` WHERE nazwa LIKE '$lista';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $cena_zapytanie = $tablica['cena'];
                        $cena = round($cena_zapytanie*0.85, 2);
                        echo $cena;
                    }
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <h3>Kontakt</h3>
        <p>telefon: 123123123<br><a href="mailto:bok@sklep.pl">email:bok@sklep.pl</a></p>
        <img src="promocja2.png" alt="promocja">
    </section>
    <footer>
        <h4>Autor strony Szymon Maniak 5TI</h4>
    </footer>
</body>
</html>