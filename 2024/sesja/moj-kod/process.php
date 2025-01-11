<?php
session_start();
$_SESSION['imie'] = $_POST['imie'];
$_SESSION['nazwisko'] = $_POST['nazwisko'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['haslo1'] = $_POST['haslo1'];
$_SESSION['haslo2'] = $_POST['haslo2'];

header('Location: potwierdzenie.php');
?>