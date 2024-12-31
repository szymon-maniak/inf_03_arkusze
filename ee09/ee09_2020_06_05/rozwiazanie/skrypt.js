function oblicz(){
    if(document.getElementById('krotkie').checked){
        document.getElementById('wynik').innerHTML = "Cena strzyżenia: 25";
    }
    else if(document.getElementById('srednie').checked){
        document.getElementById('wynik').innerHTML = "Cena strzyżenia: 30";
    }
    else if(document.getElementById('poldlugie').checked){
        document.getElementById('wynik').innerHTML = "Cena strzyżenia: 40";
    }
    else if(document.getElementById('dlugie').checked){
        document.getElementById('wynik').innerHTML = "Cena strzyżenia: 50";
    }
}