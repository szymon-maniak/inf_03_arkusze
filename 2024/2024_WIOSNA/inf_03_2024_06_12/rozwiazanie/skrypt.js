function zastosuj(zmiana){
    if(zmiana == 1){
        if(document.getElementById('blur').checked) document.getElementById('pszczola').style.filter = "blur(8px)";
        else if(document.getElementById('sepia').checked) document.getElementById('pszczola').style.filter = "sepia(100%)";
        else if(document.getElementById('negatyw').checked) document.getElementById('pszczola').style.filter = "invert(100%)";
    }
    else if(zmiana == 2){
        document.getElementById('pomarancza').style.filter = "grayscale(0%)";
    }
    else if(zmiana == 3){
        document.getElementById('pomarancza').style.filter = "grayscale(100%)";
    }
    else if(zmiana == 4){
        let przezroczystosc = document.getElementById('przezroczystosc').value;
        document.getElementById('owoce').style.filter = "opacity(" + przezroczystosc + "%)";
    }
    else if(zmiana == 5){
        let jasnosc = document.getElementById('filtr_jasnosci').value;
        document.getElementById('zolw').style.filter = "brightness(" + jasnosc + "%)";
    }
}