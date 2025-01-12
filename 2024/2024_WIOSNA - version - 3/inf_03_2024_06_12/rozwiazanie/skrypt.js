function obraz1(){
    if(document.getElementById('blur').checked) document.getElementById('pszczola').style.filter = "blur(8px)";
    else if(document.getElementById('sepia').checked) document.getElementById('pszczola').style.filter = "sepia(100%)";
    else if(document.getElementById('negatyw').checked) document.getElementById('pszczola').style.filter = "invert(100%)";
}

function obraz2(kolor){
    if(kolor == 1) document.getElementById('pomarancza').style.filter = "grayscale(0%)";
    else if(kolor == 2) document.getElementById('pomarancza').style.filter = "grayscale(100%)";
}

function obraz3(){
    let przezroczystosc = document.getElementById('przezroczystosc').value;
    document.getElementById('owoce').style.filter = "opacity("+ przezroczystosc +"%)";
}

function obraz4(){
    let filtr = document.getElementById('filtr').value;
    document.getElementById('zolw').style.filter = "brightness(" + filtr + "%)";
}