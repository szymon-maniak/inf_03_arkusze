<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Poziomy rzek</title>
</head>
<body>
    <header>
        <section id="baner1">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>
        <section id="baner2">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>
    <nav id="menu">
        <form action="poziomRzek.php" method="post">
            <label><span class="text"><input type="radio" name="buzik" value="1">Wszystkie</span></label>
            <label><span class="text"><input type="radio" name="buzik" value="2">Ponad stan ostrzegawczy</span></label>
            <label><span class="text"><input type="radio" name="buzik" value="3">Ponad stan alarmowy</span></label>
            <input type="submit" value="Pokaż">
        </form>
    </nav>
    <article id="lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
            <!-- skrypt -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'rzeki');
                if(!$polaczenie){
                    exit();
                }
                else{
                    if(@$_POST['buzik'] == 1){
                        $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05';";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tab = mysqli_fetch_array($odpowiedz)){
                            echo "<tr>";
                            echo "<td>$tab[0]</td>";
                            echo "<td>$tab[1]</td>";
                            echo "<td>$tab[2]</td>";
                            echo "<td>$tab[3]</td>";
                            echo "<td>$tab[4]</td>";
                            echo "</tr>";
                        }
                    }
                    else if(@$_POST['buzik'] == 2){
                        $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05' AND stanOstrzegawczy > pomiary.stanWody;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tab = mysqli_fetch_array($odpowiedz)){
                            echo "<tr>";
                            echo "<td>$tab[0]</td>";
                            echo "<td>$tab[1]</td>";
                            echo "<td>$tab[2]</td>";
                            echo "<td>$tab[3]</td>";
                            echo "<td>$tab[4]</td>";
                            echo "</tr>";
                        }
                    }
                    else if(@$_POST['buzik'] == 3){
                        $zapytanie = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05' AND stanAlarmowy > pomiary.stanWody;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tab = mysqli_fetch_array($odpowiedz)){
                            echo "<tr>";
                            echo "<td>$tab[0]</td>";
                            echo "<td>$tab[1]</td>";
                            echo "<td>$tab[2]</td>";
                            echo "<td>$tab[3]</td>";
                            echo "<td>$tab[4]</td>";
                            echo "</tr>";
                        }
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </table>
    </article>
    <aside id="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'rzeki');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT dataPomiaru, AVG(stanWody) FROM `pomiary` GROUP BY dataPomiaru;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tab = mysqli_fetch_array($odpowiedz)){
                    echo "<p>$tab[0]: $tab[1]</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
        <a href="http://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </aside>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>