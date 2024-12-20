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

let arg = 0;
// dziala ale tak średnio
function walidacja() {
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data_urodzenia = document.getElementById('data_urodzenia').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let numer_komorkowy = document.getElementById('numer_komorkowy').value;
    let rodo = document.getElementById('rodo').checked;

    switch (arg) {
        case 0:
            if (imie) zwiekszPasek();
            break;
        case 1:
            if (nazwisko) zwiekszPasek();
            break;
        case 2:
            if (data_urodzenia) zwiekszPasek();
            break;
        case 3:
            if (ulica) zwiekszPasek();
            break;
        case 4:
            if (numer) zwiekszPasek();
            break;
        case 5:
            if (miasto) zwiekszPasek();
            break;
        case 6:
            if (numer_komorkowy) zwiekszPasek();
            break;
        case 7:
            if (rodo) zwiekszPasek();
            break;
    }
    arg++;
}

let szerokosc = 4;
function zwiekszPasek(){
    if(szerokosc < 100){
        szerokosc += 12;
        document.getElementById('pasek').style.width = szerokosc + "%";
    }
}