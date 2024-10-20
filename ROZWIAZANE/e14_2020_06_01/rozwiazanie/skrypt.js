function oblicz(){
    let powierzchnia = document.getElementById('powierzchnia').value;
    let obliczania = Math.ceil(powierzchnia/4);
    document.getElementById('wynik').innerHTML = "Liczba jednolitrowych puszek farby potrzebnych do pomalowania wynosi: " + obliczania;
}