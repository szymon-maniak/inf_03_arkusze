function blok_1(){
    document.getElementById('blok_1').style.visibility = "hidden";
    document.getElementById('blok_2').style.visibility = "visible";
}

function blok_2(){
    document.getElementById('blok_2').style.visibility = "hidden";
    document.getElementById('blok_3').style.visibility = "visible";
}

function blok_3(){
    if(document.getElementById('haslo').value != document.getElementById('powtorz_haslo').value){
        alert('Podane hasła różnią się');
    }
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    console.log("Witaj " + imie + " " + nazwisko);
}