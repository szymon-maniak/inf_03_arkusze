function przeloczenie(liczba){
    if(liczba == 1){
        document.getElementById('pierwszy').style.display = "block";
        document.getElementById('drugi').style.display = "none";
        document.getElementById('trzeci').style.display = "none";
        document.getElementById('czwarty').style.display = "none";
    }
    else if(liczba == 2){
        document.getElementById('pierwszy').style.display = "none";
        document.getElementById('drugi').style.display = "block";
        document.getElementById('trzeci').style.display = "none";
        document.getElementById('czwarty').style.display = "none";
    }
    else if(liczba == 3){
        document.getElementById('pierwszy').style.display = "none";
        document.getElementById('drugi').style.display = "none";
        document.getElementById('trzeci').style.display = "block";
        document.getElementById('czwarty').style.display = "none";
    }
    else if(liczba == 4){
        document.getElementById('pierwszy').style.display = "none";
        document.getElementById('drugi').style.display = "none";
        document.getElementById('trzeci').style.display = "none";
        document.getElementById('czwarty').style.display = "block";
    }
}