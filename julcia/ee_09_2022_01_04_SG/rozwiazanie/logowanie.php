<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Forum o psach</title>
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <aside>
        <img src="obraz.jpg" alt="foksterier">
    </aside>
    <main>
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">
            login: <input type="text" name="login"><br>
            hasło: <input type="password" name="haslo"><br>
            powtórz hasło: <input type="password" name="powtorz_haslo"><br>
            <button>Zapisz</button>
        </form>
        <!-- skrypt php -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'psy');
            if(!$polaczenie){
                exit();
            }
            else{
                if(isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['powtorz_haslo'])){
                    $login = $_POST['login'];
                    $haslo = $_POST['haslo'];
                    $powtorz_haslo = $_POST['powtorz_haslo'];
                    $blad = false;

                    if(empty($login) || empty($haslo) || empty($powtorz_haslo)){
                        echo "<p>Wypełnij wszystkie dane</p>";
                        $blad = true;
                    }

                    $zapytanie = "SELECT login FROM `uzytkownicy`";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $login_baza = $tablica['login'];
                        if($login == $login_baza){
                            echo "<p>login wystepuje w bazie danych, konto nie zostało dodane</p>";
                            $blad = true;
                        }
                    }

                    if($haslo != $powtorz_haslo){
                        echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                        $blad = true;
                    }

                    if($blad == false){
                        $szyfr = sha1($haslo);
                        $zapytanie = "INSERT INTO `uzytkownicy`(`login`, `haslo`) VALUES ('$login','$szyfr');";
                        mysqli_query($polaczenie, $zapytanie);

                        echo "<p>Konto zostało dodane</p>";
                    }
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <nav>
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </nav>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>