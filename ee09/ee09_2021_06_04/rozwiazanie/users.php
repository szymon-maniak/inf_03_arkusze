<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Panel administratora</title>
</head>
<body>
    <header>
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <section id="lewy">
        <h4>Użytkownicy</h4>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane4');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM `osoby` LIMIT 30;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tab = mysqli_fetch_row($odpowiedz)){
                    $wiek = date('Y') - $tab[3];
                    $text .= "$tab[0]. $tab[1] $tab[2], $wiek lat<br>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </section>
    <section  id="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="users.php" method="post">
            <input type="number" name="numer">
            <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane4');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['numer'])){
                    $numer = $_POST['numer'];
                    $zapytanie = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = $numer;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tab = mysqli_fetch_row($odpowiedz)){
                        $text .= "<h2>$numer. $tab[0] $tab[1]</h2>";
                        $text .= "<img src='$tab[4]' alt='$numer'>";
                        $text .= "<p>Rok urodzenia: $tab[2]</p>";
                        $text .= "<p>Opis: $tab[3]</p>";
                        $text .= "<p>Hobby: $tab[5]</p>";
                    }
                    echo $text;
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