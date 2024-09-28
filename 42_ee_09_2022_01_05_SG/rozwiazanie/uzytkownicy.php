<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Portal społecznościowy</title>
</head>
<body>
    <header id="baner_lewy">
        <h2>Nasze osiedle</h2>
    </header>
    <header id="baner_prawy">
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'portal');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT COUNT(*) FROM `dane`;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $text .= "<h5>Liczba użytkowników portalu: ".$tablica['COUNT(*)']."</h5>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </header>
    <main id="lewy">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method="post">
            login<br>
            <input type="text" name="login"><br>
            hasło<br>
            <input type="password" name="haslo"><br>
            <input type="submit" value="Zaloguj">
        </form>
    </main>
    <main id="prawy">
        <h3>Wizytówka</h3>
        <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'portal');
                if(!$polaczenie){
                    exit();
                }
                else{
                    // sprawdza w wysłana formularz
                    if(isset($_POST['login']) && isset($_POST['haslo'])){
                        $login = $_POST['login'];
                        $haslo = $_POST['haslo'];
                        // sprawdza czy pola są niepuste
                        if($login != "" && $haslo != ""){
                            $hasloHask = sha1($haslo);
                        }
                        $zapytanie = "SELECT haslo FROM `uzytkownicy` WHERE login = '$login';";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        if(mysqli_num_rows($odpowiedz)==0){
                            // brak loginu
                            echo "login nie istnieje";
                        }
                        else{
                            $tablica = mysqli_fetch_array($odpowiedz);
                            if($hasloHask == $tablica['haslo']){
                                // prawidłowe hasło
                                $zapytanie = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy JOIN dane ON dane.id = uzytkownicy.id WHERE uzytkownicy.login = '$login';";
                                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                                $text = " ";
                                while($tablica = mysqli_fetch_assoc($odpowiedz)){
                                    $text .= "<div id='wizytowka'>";
                                    $text .= "<img src='".$tablica['zdjecie']."' alt='osoba'>";
                                    $wiek = date('Y') - $tablica['rok_urodz'];
                                    $text .= "<h4>".$tablica['login']." "."(".$wiek.")";
                                    $text .= "<p>hobby ".$tablica['hobby']."</p>";
                                    $text .= "<h1><img src='icon-on.png'>".$tablica['przyjaciol']."</h1>";
                                    $text .= "<a href='dane.html'><button type='button'>Więcej informacji</button></a>";
                                    $text .= "</div>";
                                }
                                echo $text;
                            }
                            else{
                                // hasło nieprawidłowe
                                echo "hasło nieprawidłowe";
                            }
                        }
                    }
                }
                mysqli_close($polaczenie);
            ?>
    </main>
    <footer>
        Stronę wykonał: Szymon Maniak 5TI
    </footer>
</body>
</html>