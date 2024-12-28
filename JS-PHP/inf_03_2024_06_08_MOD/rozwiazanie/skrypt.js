function blok(liczba){
    if(liczba == 1){
        document.getElementById('blok1').style.display = "block"
        document.getElementById('blok2').style.display = "none"
        document.getElementById('blok3').style.display = "none"
    }
    if(liczba == 2){
        document.getElementById('blok1').style.display = "none"
        document.getElementById('blok2').style.display = "block"
        document.getElementById('blok3').style.display = "none"
    }
    if(liczba == 3){
        document.getElementById('blok1').style.display = "none"
        document.getElementById('blok2').style.display = "none"
        document.getElementById('blok3').style.display = "block"
    }
}

function zatwierdz(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data_urodzenia = document.getElementById('data_urodzenia').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let numer_komorkowy = document.getElementById('numer_komorkowy').value;
    let rodo = document.getElementById('rodo').checked;
    // tak powinno być
    console.log(imie + ", " + nazwisko + ", " + data_urodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numer_komorkowy + ", " + rodo);
    // zrobiłem sobie takie coś bo nie chce mi się wchodzić w konsole cały czas
    document.getElementById('wynik').innerHTML = imie + ", " + nazwisko + ", " + data_urodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numer_komorkowy + ", " + rodo;
}

let imie_wypelnione = false;
let nazwisko_wypelnione = false;
let data_urodzenia = false;
let ulica_wypelnione = false;
let numer_wypelnione = false;
let miasto_wypelnione = false;
let numer_komorkowy_wypelnione = false;

function walidacja() {
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data_urodzenia = document.getElementById('data_urodzenia').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let numer_komorkowy = document.getElementById('numer_komorkowy').value;
    let rodo = document.getElementById('rodo').checked;

    if(imie !== ""){
        if(!imie_wypelnione){
            zwiekszPasek();
            imie_wypelnione = true;
        }
    }
    else{
        imie_wypelnione = false;
    }

    if(nazwisko !== ""){
        if(!nazwisko_wypelnione){
            zwiekszPasek();
            nazwisko_wypelnione = true;
        }
    }
    else{
        nazwisko_wypelnione = false;
    }

    if(data_urodzenia !== ""){
        if(!data_urodzenia_wypelnione){
            zwiekszPasek();
            data_urodzenia_wypelnione = true;
        }
    }
    else{
        data_urodzenia_wypelnione = false;
    }

    if(ulica !== ""){
        if(!ulica_wypelnione){
            zwiekszPasek();
            ulica_wypelnione = true;
        }
    }
    else{
        ulica_wypelnione = false;
    }

    if(numer !== ""){
        if(!numer_wypelnione){
            zwiekszPasek();
            numer_wypelnione = true;
        }
    }
    else{
        numer_wypelnione = false;
    }

    if(miasto !== ""){
        if(!miasto_wypelnione){
            zwiekszPasek();
            miasto_wypelnione = true;
        }
    }
    else{
        miasto_wypelnione = false;
    }

    if(numer_komorkowy !== ""){
        if(!numer_komorkowy_wypelnione){
            zwiekszPasek();
            numer_komorkowy_wypelnione = true;
        }
    }
    else{
        numer_komorkowy_wypelnione = false;
    }

    if(rodo == true){
        zwiekszPasek();
    }
}

let szerokosc = 4;
function zwiekszPasek(){
    if(szerokosc < 100){
        szerokosc += 12;
        document.getElementById('pasek').style.width = szerokosc + "%";
    }
}