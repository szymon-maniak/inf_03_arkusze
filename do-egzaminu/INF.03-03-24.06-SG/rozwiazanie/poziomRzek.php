<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Poziomy rzek</title>
</head>
<body>
    <header id="baner1">
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header id="baner2">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>
    <section id="menu">
        <form action="poziomRzek.php" method="post">
            <span class="wybor"><input type="radio" name="wybor" value="1">Wszystkie</span>
            <span class="wybor"><input type="radio" name="wybor" value="2">Ponad stan ostrzegawczy</span>
            <span class="wybor"><input type="radio" name="wybor" value="3">Ponad stan alarmowy</span>
            <input type="submit" value="Pokaż">
        </form>
    </section>
    <section id="lewy">
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
                    @$wybor = $_POST['wybor'];
                    if($wybor == 1){
                        $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05';";
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
                    else if($wybor == 2){
                        $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05' AND wodowskazy.stanOstrzegawczy < pomiary.stanWody;";
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
                    else if($wybor == 3){
                        $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05' AND wodowskazy.stanAlarmowy < pomiary.stanWody;";
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
    </section>
    <section id="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach</li>
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
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>