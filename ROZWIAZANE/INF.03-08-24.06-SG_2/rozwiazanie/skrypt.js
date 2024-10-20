function aktywuj(zmiana){
    document.getElementById('pierwszy').style.display = "none";
    document.getElementById('drugi').style.display = "none";
    document.getElementById('trzeci').style.display = "none";
    if(zmiana == 1){
        document.getElementById('pierwszy').style.display = "block";
    }
    else if(zmiana == 2){
        document.getElementById('drugi').style.display = "block";
    }
    else if(zmiana == 3){
        document.getElementById('trzeci').style.display = "block";
    }
}

let postepPaska = 4;
function zwiekszPasek(){
    if(postepPaska < 100){
        postepPaska += 12;
        document.getElementById('pusty').style.width = postepPaska + "%";
    }
}

function zatwierdzenie(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data_urodzenia = document.getElementById('data_urodzenia').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let nr_telefonu = document.getElementById('nr_telefonu').value;
    let RODO = document.getElementById('RODO').value;

    console.log(imie + ' ' + nazwisko + ' ' + data_urodzenia + ' ' + ulica + ' ' + numer + ' ' + miasto + ' ' + nr_telefonu + ' ' + RODO);
}