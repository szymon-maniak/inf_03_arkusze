<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Poziomy rzek</title>
</head>
<body>
    <header id="baner_1">
        <img src="obraz1.png" alt="Mapa polski">
    </header>
    <header id="baner_2">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>
    <nav id="menu">
        <form action="poziomRzek.php" method="post">
            <input type="radio" name="opcja" value="1"><span class="opcja_radio">Wszystkie</span>
            <input type="radio" name="opcja" value="2"><span class="opcja_radio">Ponad stan ostrzegawczy</span>
            <input type="radio" name="opcja" value="3"><span class="opcja_radio">Ponad stan alarmowy</span>
            <input type="submit" value="Pokaż">
        </form>
    </nav>
    <main id="lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
                <!-- skrypt skojarzony z formularzem -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'rzeki');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        @$opcja = $_POST['opcja'];
                        if($opcja == 1){
                            $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05';";
                            $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                            $text = " ";
                            while($tablica = mysqli_fetch_array($odpowiedz)){
                                $wodomierz = $tablica['nazwa'];
                                $rzeka = $tablica['rzeka'];
                                $ostrzegawczy = $tablica['stanOstrzegawczy'];
                                $alarmowy = $tablica['stanAlarmowy'];
                                $aktualny = $tablica['stanWody'];

                                $text .= "<tr>";
                                $text .= "<td>$wodomierz</td>";
                                $text .= "<td>$rzeka</td>";
                                $text .= "<td>$ostrzegawczy</td>";
                                $text .= "<td>$alarmowy</td>";
                                $text .= "<td>$aktualny</td>";
                                $text .= "</tr>";
                            }
                            echo $text;
                        }
                        else if($opcja == 2){
                            $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy;";
                            $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                            $text = " ";
                            while($tablica = mysqli_fetch_array($odpowiedz)){
                                $wodomierz = $tablica['nazwa'];
                                $rzeka = $tablica['rzeka'];
                                $ostrzegawczy = $tablica['stanOstrzegawczy'];
                                $alarmowy = $tablica['stanAlarmowy'];
                                $aktualny = $tablica['stanWody'];

                                $text .= "<tr>";
                                $text .= "<td>$wodomierz</td>";
                                $text .= "<td>$rzeka</td>";
                                $text .= "<td>$ostrzegawczy</td>";
                                $text .= "<td>$alarmowy</td>";
                                $text .= "<td>$aktualny</td>";
                                $text .= "</tr>";
                            }
                            echo $text;
                        }
                        else if($opcja == 3){
                            $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM `wodowskazy` JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru LIKE '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy;";
                            $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                            $text = " ";
                            while($tablica = mysqli_fetch_array($odpowiedz)){
                                $wodomierz = $tablica['nazwa'];
                                $rzeka = $tablica['rzeka'];
                                $ostrzegawczy = $tablica['stanOstrzegawczy'];
                                $alarmowy = $tablica['stanAlarmowy'];
                                $aktualny = $tablica['stanWody'];

                                $text .= "<tr>";
                                $text .= "<td>$wodomierz</td>";
                                $text .= "<td>$rzeka</td>";
                                $text .= "<td>$ostrzegawczy</td>";
                                $text .= "<td>$alarmowy</td>";
                                $text .= "<td>$aktualny</td>";
                                $text .= "</tr>";
                            }
                            echo $text;
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
            </tr>
        </table>
    </main>
    <main id="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <!-- Skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'rzeki');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT dataPomiaru, AVG(stanWody) FROM `pomiary` GROUP BY dataPomiaru;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $data = $tablica['dataPomiaru'];
                    $srednia = $tablica['AVG(stanWody)'];
                    echo "<p>$data: $srednia</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
        <a href="http://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </main>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>