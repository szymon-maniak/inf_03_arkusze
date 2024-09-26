<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka</title>
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Małych</h1>
    </header>
    <main id="lewy">
        <h4>Dodaj czytelnika</h4>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="imie"><br>
            nazwisko: <input type="text" name="nazwisko"><br>
            symbol: <input type="number" name="symbol"><br>
            <input type="submit" value="AKCEPTUJ">
        </form>
        <!-- skrypt 1 -->
    </main>
    <main id="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h6>ul. Czytelników&nbsp;15; Książkowice Małe</h6>
        <a href="mailto:biuro@bib.pl"><p>Czy masz jakieś uwagi?</p></a>
    </main>
    <main id="prawy">
        <h4>Nasi czytelnicy:</h4>
        <ul>
            <!-- skrypt 2 -->
        </ul>
    </main>
    <footer>
        <p>Projekt witryny: Szymon Maniak 5TI</p>   
    </footer>
</body>
</html>