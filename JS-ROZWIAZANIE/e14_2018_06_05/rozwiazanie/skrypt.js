function oblicz_koszt(){
    let ilosc_gosci = document.getElementById('ilosc_gosci').value;
    let poprawiny = document.getElementById('poprawiny').checked;
    let cena = ilosc_gosci * 100;
    if(poprawiny){
        cena *= 1.3;
    }
    document.getElementById('wynik').innerHTML = "Koszt Twojego wesela to " + cena + " złotych";
}