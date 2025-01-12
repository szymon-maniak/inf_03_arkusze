let aktywne_zdjecie = 1;
function poprzednie(){
    aktywne_zdjecie -= 1;
    if(aktywne_zdjecie < 1) aktywne_zdjecie = 7;
    document.getElementById('aktywne_zdjecie').src = aktywne_zdjecie + ".jpg";
}

function nastepne(){
    aktywne_zdjecie += 1;
    if(aktywne_zdjecie > 7) aktywne_zdjecie = 1;
    document.getElementById('aktywne_zdjecie').src = aktywne_zdjecie + ".jpg";
}