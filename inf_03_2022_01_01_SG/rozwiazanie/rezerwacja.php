<?php
    $conn = mysqli_connect('localhost','root','','baza');
    if(!$conn){
        exit();
    }
    else{
        $data = $_POST['data'];
        $osoby = $_POST['osoby'];
        $telefon = $_POST['telefon'];


        $polecenie = "INSERT INTO `rezerwacje`(`data_rez`, `liczba_osob`, `telefon`) VALUES ('$data','$osoby','$telefon');";
        mysqli_query($conn,$polecenie);

        echo "Dodano rezerwację do bazy";
    }

    mysqli_close($conn);
?>