function oblicz(){
    let rodzaj = document.getElementById('rodzaj').value;
    let ilosc = document.getElementById('ilosc').value;

    if(rodzaj == 1) litr = 4;
    else if(rodzaj == 2) litr = 3.5;
    else litr = 0; 

    let cena = ilosc*litr;
    document.getElementById('wynik').innerHTML = "koszt paliwa: " + cena + "zł";
}