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
    <section id="prawy_1">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">
            login: <input type="text" name="login"><br>
            hasło: <input type="password" name="haslo"><br>
            powtorz hasło: <input type="password" name="powtorz_haslo"><br>
            <input type="submit" value="Zapisz">
        </form>
        <!-- skrypt -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'psy');
            if(!$polaczenie){
                exit();
            }
            else{
                $liczba = 0;
                if(empty($_POST['login']) || empty($_POST['haslo']) || empty($_POST['powtorz_haslo'])){
                    echo "<p>wypełnij wszystkie pola</p>";
                    $liczba++;
                }
                $zapytanie = "SELECT login FROM `uzytkownicy` WHERE 1;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    if(@$_POST['login'] == $tablica[0]){
                        echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                        $liczba++;
                    }
                }
                if(@$_POST['haslo'] != @$_POST['powtorz_haslo']){
                    echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                    $liczba++;
                }
                if($liczba == 0){
                    @$login = $_POST['login'];
                    @$haslo = $_POST['haslo'];
                    $szyfr = sha1($haslo);
                    $zapytanie_2 = "INSERT INTO `uzytkownicy`(`id`, `login`, `haslo`) VALUES (null,'$login','$szyfr');";
                    mysqli_query($polaczenie, $zapytanie_2);
                    echo "<p>Konto zostało dodane</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy_2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właściciele psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupic psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    <footer>
        Stronę wykonał: 18
    </footer>
</body>
</html>