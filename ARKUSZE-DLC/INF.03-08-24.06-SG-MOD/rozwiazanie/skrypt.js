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
    let rodo = document.getElementById('rodo').value;
    // tak powinno być
    console.log(imie + ", " + nazwisko + ", " + data_urodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numer_komorkowy + ", " + rodo);
    // zrobiłem sobie takie coś bo nie chce mi się wchodzić w konsole cały czas
    document.getElementById('wynik').innerHTML = imie + ", " + nazwisko + ", " + data_urodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numer_komorkowy + ", " + rodo;
}

function walidacja(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data_urodzenia = document.getElementById('data_urodzenia').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let numer_komorkowy = document.getElementById('numer_komorkowy').value;
    let rodo = document.getElementById('rodo').value;

    if(!imie == null || !imie == ""){
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