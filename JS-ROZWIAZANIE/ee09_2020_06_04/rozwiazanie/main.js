function suma(){
    let piling = document.getElementById('piling').checked;
    let maska = document.getElementById('maska').checked;
    let masaz_twarzy = document.getElementById('masaz_twarzy').checked;
    let regulacja_brwi = document.getElementById('regulacja_brwi').checked;
    let cena = 0;
    
    if(piling){
        cena += 45;
    }
    if(maska){
        cena += 30;
    }
    if(masaz_twarzy){
        cena += 20;
    }
    if(regulacja_brwi){
        cena += 5;
    }
    document.getElementById('wynik').innerHTML = "Cena zabiegów: " + cena;
}