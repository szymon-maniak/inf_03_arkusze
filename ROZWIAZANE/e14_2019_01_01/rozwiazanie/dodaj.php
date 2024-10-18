<?php
    include('index.html');
    $polaczenie = mysqli_connect('localhost', 'root', '', 'dane');
    if(!$polaczenie){
        exit();
    }
    else{
        $tytul = $_POST['tytul'];
        $gatunek_filmu = $_POST['gatunek_filmu'];
        $rok_produkcji = $_POST['rok_produkcji'];
        $ocena = $_POST['ocena'];
        $zapytanie = "INSERT INTO `filmy`(`id`, `gatunki_id`, `tytul`, `rok`, `ocena`) VALUES (NULL,$gatunek_filmu,'$tytul',$rok_produkcji,$ocena);";
        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
        echo "Film $tytul został dodany do bazy";
    }
    mysqli_close($polaczenie);
?>