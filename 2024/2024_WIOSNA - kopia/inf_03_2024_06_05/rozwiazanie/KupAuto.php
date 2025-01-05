<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Komis aut</title>
</head>
<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    <main>
        <section id="glowny1">
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM `samochody` WHERE id LIKE 10;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $ile = mysqli_num_rows($odpowiedz);
                    for ($i=0; $i < $ile; $i++) { 
                        $tab = mysqli_fetch_array($odpowiedz);
                        echo "<img src='$tab[5]' alt='oferta dnia'>";
                        echo "<h4>Oferta Dnia: Toyota $tab[0]</h4>";
                        echo "<p>Rocznik: $tab[1], przebieg: $tab[2], rodzaj paliwa: $tab[3]</p>";
                        echo "<h4>Cena: $tab[4]</h4>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </section>
        <section id="glowny2">
            <h2>Oferty Wyróżnione</h2>
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM `marki` JOIN samochody ON marki.id = samochody.marki_id WHERE samochody.wyrozniony LIKE 1 LIMIT 4;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $ile = mysqli_num_rows($odpowiedz);
                    for ($i=0; $i < $ile; $i++) { 
                        $tab = mysqli_fetch_array($odpowiedz);
                        echo "<section class='oferta'>";
                        echo "<img src='$tab[4]' alt='$tab[1]'>";
                        echo "<h4>$tab[0] $tab[1]</h4>";
                        echo "<p>Rocznik: $tab[2]</p>";
                        echo "<h4>Cena: $tab[3]</h4>";
                        echo "</section>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </section>
        <section id="glowny3">
            <h2>Wybierz markę</h2>
            <form action="KupAuto.php" method="post">
                <select name="nazwa">
                    <!-- skrypt 3 -->
                    <?php
                        $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
                        if(!$polaczenie){
                            exit();
                        }
                        else{
                            $zapytanie = "SELECT nazwa FROM `marki` WHERE 1;";
                            $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                            while($tab = mysqli_fetch_array($odpowiedz)){
                                echo "<option value='$tab[0]'>$tab[0]</option>";
                            }
                        }
                        mysqli_close($polaczenie);
                    ?>
                </select>
                <input type="submit" value="Wyszukaj">
            </form>
            <!-- skrypt 4 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
                if(!$polaczenie){
                    exit();
                }
                else{
                    @$nazwa = $_POST['nazwa'];
                    $zapytanie = "SELECT model, cena, zdjecie FROM `samochody` JOIN marki ON samochody.marki_id = marki.id WHERE marki.nazwa LIKE '$nazwa';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "<section class='oferta'>";
                        echo "<img src='$tab[2]' alt='$tab[0]'>";
                        echo "<h4>$nazwa $tab[0]</h4>";
                        echo "<h4>Cena: $tab[1]</h4>";
                        echo "</section>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>