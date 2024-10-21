function cytat(zmienna){
    if(zmienna == 1){
        document.getElementById('cytat_1').style.display = "none";
        document.getElementById('cytat_2').style.display = "block";
    }
    else if(zmienna == 2){
        document.getElementById('cytat_2').style.display = "none";
        document.getElementById('cytat_3').style.display = "block";
    }
    else if(zmienna == 3){
        document.getElementById('cytat_3').style.display = "none";
        document.getElementById('cytat_1').style.display = "block";
    }
}