<?php
    echo "Dodano rezerwację do bazy";
    $polaczenie = mysqli_connect('localhost','root','','baza');
    if(!$polaczenie){
        exit();
    }
    else{
        $data = $_POST['data'];
        $osoby = $_POST['osoby'];
        $telefon = $_POST['telefon'];
        $zgadzam_sie = $_POST['zgadzam_sie'];

        $zapytanie = "INSERT INTO `rezerwacje`(`data_rez`, `liczba_osob`, `telefon`) VALUES ('$data','$osoby','$telefon');";
        mysqli_query($polaczenie, $zapytanie);
    }
    mysqli_close($polaczenie);
?>