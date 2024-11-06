<?php
    $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
    if(!$polaczenie){
        exit();
    }
    else{
        if(!empty($_POST['imie'] && !empty($_POST['nazwisko'] && !empty($_POST['adres'])))){
            $imie  = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $adres = $_POST['adres'];
            $zapytanie = "INSERT INTO `karty_wedkarskie`(`imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES ('$imie','$nazwisko','$adres', NULL,NULL);";
            mysqli_query($polaczenie, $zapytanie);
        }
    }
    mysqli_close($polaczenie);
?>