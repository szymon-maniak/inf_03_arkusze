<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Twoje BMI</title>
</head>
<body>
    <header id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </header>
    <header id="baner">
        <h1>Oblicz swoje BMI</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Interpretacja BMI</th>
                <th>Wartość minimalna</th>
                <th>Wartość maksymalna</th>
            </tr>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT informacja, wart_min, wart_max FROM `bmi` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        $text .= "<tr>";
                        $text .= "<td>$tablica[0]</td>";
                        $text .= "<td>$tablica[1]</td>";
                        $text .= "<td>$tablica[2]</td>";
                        $text .= "</tr>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </table>
    </main>
    <section id="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form action="bmi.php" method="post">
            Waga: <input type="number" name="waga" min="1"><br>
            Wzrost w cm: <input type="number" name="wzrost" min="1"><br>
            <input type="submit" value="Oblicz i zapamiętaj wynik">
        </form>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '' , 'egzamin');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['waga']) && !empty($_POST['wzrost'])){
                    $waga = $_POST['waga'];
                    $wzrost = $_POST['wzrost'];

                    $bmi = $waga/($wzrost * $wzrost);
                    $bmi *= 10000;
                    echo "Twoja waga: $waga; Twój wzrost: $wzrost <br>BMI wynosi: $bmi";

                    $przedzial = 0;
                    if($bmi >= 0 && $bmi <= 18) $przedzial = 1;
                    else if($bmi >= 19 && $bmi <=25) $przedzial = 2;
                    else if($bmi >= 16 && $bmi <= 30) $przedzial = 3;
                    else if($bmi >= 31 && $bmi <=100) $przedzial = 4; 

                    $data_pomiaru = date('Y-m-d');
                    $zapytanie = "INSERT INTO `wynik`(`bmi_id`, `data_pomiaru`, `wynik`) VALUES ('$przedzial','$data_pomiaru','$bmi');";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section  id="prawy">
        <img src="rys1.png" alt="ćwiczenia">
    </section>
    <footer>
        Autor: Szymon Maniak 5TI
        <a href="kwerendy.txt">Zobacz kwerendy</a>
    </footer>
</body>
</html>