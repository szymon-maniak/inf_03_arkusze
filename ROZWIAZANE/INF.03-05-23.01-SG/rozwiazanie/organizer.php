<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Sierpniowy kalendarz</title>
</head>
<body>
    <header id="baner_1">
        <h1>Organizer: SIERPIEŃ</h1>
    </header>
    <header id="baner_2">
        <form action="organizer.php" method="post">
            Zapisz wydarzenie:<input type="text" name="wydarzenie">
            <button type="submit">OK</button>
        </form>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kalendarz');
            if(!$polaczenie){
                exit();
            }
            else{
                if(isset($_POST['submit'])){
                    $wydarzenie = $_POST['wydarzenie'];
                    $zapytanie = "UPDATE `zadania` SET `wpis`='$wydarzenie' WHERE dataZadania LIKE '2020-08-09';";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
    </header>
    <header id="baner_3">
        <img src="logo2.png" alt="sierpień">
    </header>
    <main>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kalendarz');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT dataZadania, wpis FROM `zadania` WHERE miesiac LIKE 'sierpien';";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = "";
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $dataZadania = $tablica['dataZadania'];
                    $wpis = $tablica['wpis'];
                    
                    $text .= "<div class='kalendarz'>";
                    $text .= "<h5>$dataZadania</h5>";
                    $text .= "<p>$wpis</p>";
                    $text .=  "</div>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>