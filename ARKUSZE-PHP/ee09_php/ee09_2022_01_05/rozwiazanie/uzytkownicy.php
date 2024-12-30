<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Portal społecznościowy</title>
</head>
<body>
    <header>
        <section id="baner_lewy">
            <h2>Nasze osiedle</h2>
        </section>
        <section id="baner_prawy">
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'portal');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT COUNT(*) FROM `dane` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        echo "<h5>Liczba użytkowników portalu: $tablica[0]</h5>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </section>
    </header>
    <section id="lewy">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method="post">
            login<br>
            <input type="text" name="login"><br>
            hasło<br>
            <input type="password" name="haslo"><br>
            <input type="submit" value="Zaloguj">
        </form>
    </section>
    <section id="prawy">
        <h3>Wizytówka</h3>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'portal');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['login']) && !empty($_POST['haslo'])){
                    $login = $_POST['login'];
                    $haslo = $_POST['haslo'];

                    $zapytanie = "SELECT haslo FROM `uzytkownicy` WHERE login LIKE '$login';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    if(mysqli_num_rows($odpowiedz) == 1){
                        $zapytanie = "SELECT haslo FROM `uzytkownicy` WHERE login LIKE '$login';";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tablica = mysqli_fetch_array($odpowiedz)){
                            $szyfr = sha1($haslo);
                            if($szyfr = $tablica['haslo']){
                                $zapytanie_3 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM `uzytkownicy` JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login = '$login';";
                                $odpowiedz_3 = mysqli_query($polaczenie, $zapytanie_3);
                                while($tablica_3 = mysqli_fetch_array($odpowiedz_3)){
                                    $login_baza = $tablica_3['login'];
                                    $rok_urodzenia = $tablica_3['rok_urodz'];
                                    $przyjaciel = $tablica_3['przyjaciol'];
                                    $hobby = $tablica_3['hobby'];
                                    $zdjecie = $tablica_3['zdjecie'];

                                    echo "<div id='wizytowka'>";
                                    echo "<img src='$zdjecie' alt='osoba'>";
                                    $wiek = date('Y') - $rok_urodzenia;
                                    echo "<h4>$login_baza ($wiek)</h4>";
                                    echo "<p>hobby: $hobby</p>";
                                    echo "<h1><img src='icon-on.png'> $przyjaciel</h1>";
                                    echo "<a href='dane.html'><button>Więcej informacji</button></a>";
                                    echo "</div>";
                                }
                            }
                            else{
                                echo "hasło nieprawidłowe";
                            }
                        }
                       
                    }
                    else{
                        echo "login nie istnieje";
                    }
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        Stronę wykonał: Szymon Maniak 5TI
    </footer>
</body>
</html>