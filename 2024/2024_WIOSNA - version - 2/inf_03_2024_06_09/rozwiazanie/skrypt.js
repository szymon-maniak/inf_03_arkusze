let aktualneZdjecie = 1;
function nastepny(){
    aktualneZdjecie++;
    if(aktualneZdjecie > 7) aktualneZdjecie = 1;
    document.getElementById('aktywne_zdjecie').src = aktualneZdjecie + ".jpg";
}

function poprzedni(){
    aktualneZdjecie--;
    if(aktualneZdjecie < 1) aktualneZdjecie = 7;
    document.getElementById('aktywne_zdjecie').src = aktualneZdjecie + ".jpg";
}