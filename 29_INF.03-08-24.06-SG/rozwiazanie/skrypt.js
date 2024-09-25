function aktywacja(wybor){
    document.getElementById("blok_1").style.display = "none";
    document.getElementById("blok_2").style.display = "none";
    document.getElementById("blok_3").style.display = "none";

    if(wybor == 1){
        document.getElementById('blok_1').style.display = "block";
    }
    else if(wybor == 2){
        document.getElementById('blok_2').style.display = "block";
    }
    else if(wybor == 3){
        document.getElementById('blok_3').style.display = "block";
    }
}

let procent = 4;
function pasek(){
    if(procent < 100){
        procent += 12;
        document.getElementById("pasek").style.width = procent + "%";
    }
}

function zatwierdzajaca(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data_urodzenia = document.getElementById('data_urodzenia').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let tel = document.getElementById('tel').value;
    let rodo = document.getElementById('rodo').value;

    console.log("Imię: ", imie);
    console.log("Nazwisko: ", nazwisko);
    console.log("Data urodzenia: ", data_urodzenia);
    console.log("Ulica: ", ulica);
    console.log("Numer: ", numer);
    console.log("Miasto: ", miasto);
    console.log("Telefon: ", tel);
    console.log("RODO: ", rodo);
}