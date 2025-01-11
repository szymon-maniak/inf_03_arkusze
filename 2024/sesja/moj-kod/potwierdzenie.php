<?php
session_start();

// Sprawdzenie, czy dane są w sesji
if (!isset($_SESSION['imie']) || !isset($_SESSION['nazwisko'])) {
    echo "Brak danych w sesji.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie rejestracji</title>
</head>
<body>
    <h1>Potwierdzenie rejestracji</h1>
    <p>Dziękujemy za rejestrację, <strong><?php echo $_SESSION['imie'] . ' ' . $_SESSION['nazwisko']; ?></strong></p>
    <p>Twój e-mail: <?php echo $_SESSION['email']; ?></p>
    <p>Twój numer telefonu: <?php echo $_SESSION['tel']; ?></p>
    <p><a href="index.php">Powrót do formularza</a></p>
</body>
</html>