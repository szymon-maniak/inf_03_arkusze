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
    <main>
        <section id="lewy">
            <img src="obraz.jpg" alt="foksterier">
        </section>
        <section id="prawy1">
            <h2>Zapisz się</h2>
            <form action="logowanie.php" method="post">
                login: <input type="text" name="login"><br>
                hasło: <input type="password" name="haslo"><br>
                powtórz hasło: <input type="password" name="haslo_2"><br>
                <input type="submit" value="Zapisz">
            </form>
            <!-- skrypt -->
            <?php
                $ok = true;
                $polaczenie = mysqli_connect('localhost', 'root', '', 'psy');
                if(!$polaczenie){
                    exit();
                }
                else{
                    if(empty($_POST['login']) || empty($_POST['haslo']) || empty($_POST['haslo_2'])){
                        echo "<p>wypełnij wszystkie pola</p>";
                        $ok = false;
                    }
                    $zapytanie = "SELECT login FROM `uzytkownicy` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        @$login = $_POST['login'];
                        if($tablica[0] == $login){
                            echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                            $ok = false;
                        }
                    }
                    @$haslo = $_POST['haslo'];
                    @$haslo_2 = $_POST['haslo_2'];
                    if($haslo != $haslo_2){
                        echo "<p>hasła nie są takie same, konto nie zostało dodane<p>";
                        $ok = false;
                    }

                    if($ok == true){
                        @$login = $_POST['login'];
                        @$haslo = $_POST['haslo'];
                        $szyfr = sha1($haslo);
                        $zapytanie = "INSERT INTO `uzytkownicy`(`login`, `haslo`) VALUES ('$login','$szyfr');";
                        mysqli_query($polaczenie, $zapytanie);
                        echo "<p>Konto zostało dodane</p>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </section>
        <section id="prawy2">
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>właściciele psów</li>
                <li>weterynarzy</li>
                <li>tych, co chcą kupić psa</li>
                <li>tych, co lubią psy</li>
            </ol>
            <a href="regulamin.html">Przeczytaj regulamin forum</a>
        </section>
    </main>
    <footer>
        Stronę wykonał: Szymon Maniak 5TI
    </footer>
</body>
</html>