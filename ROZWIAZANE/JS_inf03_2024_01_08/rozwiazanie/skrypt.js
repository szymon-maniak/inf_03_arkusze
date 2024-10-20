function oblicz(){
    let cena = 0;
    if(document.getElementById('krotkie').checked) cena = 25;
    if(document.getElementById('srednie').checked) cena = 30;
    if(document.getElementById('poldlugie').checked) cena = 40;
    if(document.getElementById('dlugie').checked) cena = 50;
    cena -= 10;
    document.getElementById('wynik').innerHTML = "cena promocyjna: " + cena;
}