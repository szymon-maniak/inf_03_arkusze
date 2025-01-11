function aktywacja(blok){
    document.getElementById('blok1').style.display = "none";
    document.getElementById('blok2').style.display = "none";
    document.getElementById('blok3').style.display = "none";
    if(blok == 1){
        document.getElementById('blok1').style.display = "block";
    } else if(blok == 2){
        document.getElementById('blok2').style.display = "block";
    } else if(blok == 3){
        document.getElementById('blok3').style.display = "block";
    }
}

let szerokosc = 4;
function zwieksz_pasek(){
    if(szerokosc < 100){
        szerokosc += 12;
        document.getElementById('pasek').style.width =  szerokosc + "%";
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

    console.log(imie + ", " + nazwisko + ", " + data_urodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numer_komorkowy + ", " + rodo);
}