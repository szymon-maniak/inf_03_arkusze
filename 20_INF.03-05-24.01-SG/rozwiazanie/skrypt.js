function oblicz(){
    peeling = document.getElementById("peeling").checked;
    maska = document.getElementById("maska").checked;
    masaz = document.getElementById("masaz").checked;
    makijaz = document.getElementById("makijaz").checked;
    cena = 0;
    if(peeling) cena += 45;
    if(maska) cena += 30;
    if(masaz) cena += 20;
    if(makijaz) cena += 50;

    document.getElementById("wynik").innerHTML = "Cena zabiegów: " + cena;
}