<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Hodowla świnek morskich</title>
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav id="menu">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <section id="prawy">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <!-- skrypt 1 -->
            <?php 
                polaczenie(
                    "SELECT rasa FROM `rasy` WHERE 1;",
                    function($tab) {
                        echo "<li>$tab[0]</li>";
                    }
                );
            ?>
        </ol>
    </section>
    <section id="glowny">
    <img src="crested.jpg" alt="Świnka morska rasy crested">
        <!-- skrypt 2 -->
        <?php
            polaczenie(
                "SELECT DISTINCT(data_ur), miot, rasy.rasa FROM `swinki` JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy.id LIKE 7;",
                function($tab) {
                    echo "<h2>Rasa: $tab[2]</h2>";
                    echo "<p>Data urodzenia: $tab[0]</p>";
                    echo "<p>Oznaczenie miotu: $tab[1]</p>";
                }
            );
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <!-- skrypt 3 -->
        <?php
            polaczenie(
                "SELECT imie, cena, opis FROM `swinki` WHERE rasy_id LIKE 7;",
                function($tab) {
                    echo "<h3>$tab[0] - $tab[1] zł</h3>";
                    echo "<p>$tab[2]</p>";
                }
            );
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
    <?php
        function polaczenie($zapytanie, $callback){
            $polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla');
            if (!$polaczenie) {
                exit();
            } else {
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while ($tab = mysqli_fetch_array($odpowiedz)) {
                    $callback($tab);
                }
            }
            mysqli_close($polaczenie);
        }
    ?>
</body>
</html>