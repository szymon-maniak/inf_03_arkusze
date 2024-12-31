<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Forum o psach</title>
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <section id="lewy">
        <img src="Avatar.png" alt="Użytkownik forum">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'forumpsy');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT konta.nick, konta.postow, pytania.pytanie FROM `konta` JOIN pytania ON konta.id = pytania.konta_id WHERE pytania.id = 1;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nick = $tablica['nick'];
                    $postow = $tablica['postow'];
                    $pytanie = $tablica['pytanie'];

                    echo "<h4>$nick</h4>";
                    echo "<p>$postow postów na forum</p>";
                    echo "<p>$pytanie</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
        <video controls loop>
            <source src="video.mp4" type="video/mp4">
        </video>
    </section>
    <section id="prawy">
        <form action="index.php" method="post">
            <textarea name="text" cols="40" rows="4"></textarea>
            <input type="submit" value="Dodaj odpowiedź">
        </form>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '' , 'forumpsy');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['text'])){
                    $text = $_POST['text'];
                    $zapytanie = "INSERT INTO `odpowiedzi`(`id`, `Pytania_id`, `konta_id`, `odpowiedz`) VALUES ('NULL','1','5','$text');";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <!-- skrypt 3 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'forumpsy');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM `odpowiedzi` JOIN konta ON odpowiedzi.konta_id = konta.id WHERE odpowiedzi.Pytania_id = 1;";
                    $kwerenda_odp = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($kwerenda_odp)){
                        $id = $tablica['id'];
                        $odpowiedz = $tablica['odpowiedz'];
                        $nick = $tablica['nick'];

                        echo "<li>$odpowiedz $nick</li>";
                        echo "<hr>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <footer>
        Autor: Szymon Maniak 5TI
        <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>