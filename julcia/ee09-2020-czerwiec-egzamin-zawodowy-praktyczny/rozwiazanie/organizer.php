<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Organizer</title>
</head>
<body>
    <header id="baner_1">
        <h2>MÓJ ORGANIZER</h2>
    </header>
    <header id="baner_2">
        <form action="" method="post">
            Wpis wydarzenia: <input type="text" name="wydarzenia">
            <button type="submit" name="zapisz">ZAPISZ</button>
        </form>
        <!-- formularz kalendarz -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '' , 'egzamin6');
            if(!$polaczenie){
                exit();
            }
            else{
                if(isset($_POST['zapisz'])){
                    $wydarzenia = $_POST['wydarzenia'];
                    $zapytanie = "UPDATE `zadania` SET `wpis`='$wydarzenia' WHERE dataZadania LIKE '2020-08-27';";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
    </header>
    <header id="baner_3">
        <img src="logo2.png" alt="Mój organizer">
    </header>
    <main>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin6');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT dataZadania, miesiac, wpis FROM `zadania` WHERE miesiac LIKE 'sierpien';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $dataZadania = $tablica['dataZadania'];
                    $miesiac = $tablica['miesiac'];
                    $wpis =  $tablica['wpis'];

                    echo "<div class='dzien'>
                    <h6>$dataZadania, $miesiac</h6>
                    <p>$wpis</p>
                    </div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin6');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT miesiac, rok FROM `zadania` WHERE dataZadania LIKE '2020-08-01';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $miesiac = $tablica['miesiac'];
                    $rok = $tablica['rok'];

                    echo "<h1>miesiąc: $miesiac, rok: $rok</h1>";
                }
            }
            mysqli_close($polaczenie);
        ?>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>