function oblicz(){
    let krotkie = document.getElementById('krotkie').checked;
    let srednie = document.getElementById('srednie').checked;
    let poldlugie = document.getElementById('poldlugie').checked;
    let dlugie = document.getElementById('dlugie').checked;
    let suma = 0;
    if(krotkie) suma += 25;
    if(srednie) suma += 30;
    if(poldlugie) suma += 40;
    if(dlugie) suma += 50;
    suma -= 10;
    document.getElementById('wynik').innerHTML = "cena promocyjna: " + suma;
}