function oblicz(){
    let piling = document.getElementById('piling').checked;
    let maska = document.getElementById('maska').checked;
    let masaz_twarzy = document.getElementById('masaz_twarzy').checked;
    let regulacja_brwi = document.getElementById('regulacja_brwi').checked;
    let suma = 0;

    if(piling) suma += 45;
    if(maska) suma += 30;
    if(masaz_twarzy) suma += 20;
    if(regulacja_brwi) suma += 5;

    document.getElementById('wynik').innerHTML = "Cena zabiegów: " + suma;
}