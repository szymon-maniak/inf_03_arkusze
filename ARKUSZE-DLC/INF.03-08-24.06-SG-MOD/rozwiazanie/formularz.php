<?php
    include('rejestracja.html');
    $polaczenie = mysqli_connect('localhost', 'root', '', 'klienci');
    if(!$polaczenie){
        exit();
    }
    else{
        if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['data_urodzenia']) && isset($_POST['ulica']) && isset($_POST['numer']) && isset($_POST['miasto']) && isset($_POST['numer_komorkowy']) && isset($_POST['rodo'])){
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $data_urodzenia = $_POST['data_urodzenia'];
            $ulica = $_POST['ulica'];
            $numer = $_POST['numer'];
            $miasto = $_POST['miasto'];
            $numer_komorkowy = $_POST['numer_komorkowy'];
            $rodo = $_POST['rodo'];

            $osoby = "INSERT INTO `osoby`(`imie`, `nazwisko`, `dataUr`) VALUES ('$imie','$nazwisko','$data_urodzenia');";
            mysqli_query($polaczenie, $osoby);
            $id_osoby = "SELECT MAX(id) FROM `osoby`;";
            $osoby_odp = mysqli_query($polaczenie, $id_osoby);
            $osoby_tab = mysqli_fetch_array($osoby_odp);

            $adresy = "INSERT INTO `adresy`(`Osoby_id`, `ulica`, `numer`, `miasto`) VALUES ('$osoby_tab[0]','$ulica','$numer','$miasto');";
            mysqli_query($polaczenie, $adresy);

            $telefony = "INSERT INTO `telefony`(`Osoby_id`, `numer`) VALUES ('$osoby_tab[0]','$numer_komorkowy');";
            mysqli_query($polaczenie, $telefony);
        }
    }
    mysqli_close($polaczenie);
?>