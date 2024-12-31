function obraz_1(){
    let pszczola = document.getElementById('pszczola');
    if(document.getElementById('blur').checked){
        pszczola.style.filter = "blur(5px)";
    }
    else if(document.getElementById('sepia').checked){
        pszczola.style.filter = "sepia(100%)";
    }
    else if(document.getElementById('negatyw').checked){
        pszczola.style.filter = "invert(100%)";
    }
}

function obraz_2(zmienna){
    let pomarancza = document.getElementById('pomarancza');
    if(zmienna == 1){
        pomarancza.style.filter = "grayscale(0%)";
    }
    else if(zmienna == 2){
        pomarancza.style.filter = "grayscale(100%)";
    }
}

function obraz_3(){
    let owoce = document.getElementById('owoce');
    let suwak_owoce = document.getElementById('suwak_owoce').value;
    let text = "opacity("+ suwak_owoce +"%)";
    owoce.style.filter = text;
}

function obraz_4(){
    let zolw = document.getElementById('zolw');
    let suwak_zolw = document.getElementById('suwak_zolw').value;
    let text = "brightness("+ suwak_zolw +"%)";
    zolw.style.filter = text;
}