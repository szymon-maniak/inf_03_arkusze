<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Zadania na lipiec</title>
</head>
<body>
    <header id="baner_1">
        <img src="logo1.png" alt="lipiec">
    </header>
    <header id="baner_2">
        <h1>TERMINARZ</h1>
        <p>najbliższe zadania:
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'terminarz');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT DISTINCT wpis FROM `zadania` WHERE dataZadania >= '2020-07-01' AND dataZadania <= '2020-07-07' AND wpis != '';";

                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);

                    $text = "";
                    while($row = mysqli_fetch_row($odpowiedz)){
                        $text .= $row[0]."; ";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </p>
    </header>
    <div style="clear: both;"></div>
    <main id="glowny">
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'terminarz');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        $zapytanie = "SELECT `dataZadania`, `wpis` FROM `zadania` WHERE miesiac = 'lipiec';";

                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);

                        /*
                            <div>
                            <h6>data</h6>
                            <p>opis</p>
                            </div>
                        */

                        $text = "";
                        while($row = mysqli_fetch_assoc($odpowiedz)){
                            $text .= '<div>';
                            $text .= '<h6>'.$row['dataZadania'].'</h6>';
                            $text .= '<p>'.$row['wpis'].'</p>';
                            $text .= '</div>';
                        }

                        echo $text;
                    }
                    mysqli_close($polaczenie);
                ?>
    </main>
    <div style="clear: both;"></div>
    <footer id="stopka">
        <a href="sierpien.html">Terminasz na sierpień</a>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>