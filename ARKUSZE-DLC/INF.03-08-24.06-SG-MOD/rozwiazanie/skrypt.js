function blok(liczba){
    if(liczba == 1){
        document.getElementById('blok1').style.display = "block"
        document.getElementById('blok2').style.display = "none"
        document.getElementById('blok3').style.display = "none"
    }
    if(liczba == 2){
        document.getElementById('blok1').style.display = "none"
        document.getElementById('blok2').style.display = "block"
        document.getElementById('blok3').style.display = "none"
    }
    if(liczba == 3){
        document.getElementById('blok1').style.display = "none"
        document.getElementById('blok2').style.display = "none"
        document.getElementById('blok3').style.display = "block"
    }
}