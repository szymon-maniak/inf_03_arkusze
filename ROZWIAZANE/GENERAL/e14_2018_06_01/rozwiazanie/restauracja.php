<?php
$con = mysqli_connect('localhost', 'root', '', 'baza');
if(!empty($_POST['data']) && !empty($_POST['osob']) && !empty($_POST['telefon'])) {
	$data = $_POST['data'];
	$osob = $_POST['osob'];
	$telefon = $_POST['telefon'];
	$kw = "INSERT INTO rezerwacje(id, data_rez, liczba_osob, telefon) VALUES (NULL, '$data', $osob, '$telefon');";
	mysqli_query($con, $kw);
	echo "Dodano rezerwacje do bazy";
}
mysqli_close($con);
?>