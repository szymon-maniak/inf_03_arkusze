function cytat(liczba){
    if(liczba == 1){
        document.getElementById('cytat1').style.display = "none";
        document.getElementById('cytat2').style.display = "block";
    }
    else if(liczba == 2){
        document.getElementById('cytat2').style.display = "none";
        document.getElementById('cytat3').style.display = "block";
    }
    else if(liczba == 3){
        document.getElementById('cytat3').style.display = "none";
        document.getElementById('cytat1').style.display = "block";
    }
}