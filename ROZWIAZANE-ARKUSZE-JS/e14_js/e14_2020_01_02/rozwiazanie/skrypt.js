function zamowienie(){
    let ksztalt = document.getElementById('ksztalt').value;
    if(ksztalt == 1){
        document.getElementById('wynik').innerHTML = "Zamówiłeś żelka: miś";
    }
    else if(ksztalt == 2){
        document.getElementById('wynik').innerHTML = "Zamówiłeś żelka: żabka";
    }
    else if(ksztalt == 3){
        document.getElementById('wynik').innerHTML = "Zamówiłeś żelka: serce";
    }
    else{
        document.getElementById('wynik').innerHTML = "Zamówiłeś żelka: inny kształt";
    }

    let R = document.getElementById('litera_R').value;
    let G = document.getElementById('litera_G').value;
    let B = document.getElementById('litera_B').value;
    document.getElementById('przycisk').style = "background-color: rgb("+R+","+G+","+B+");";
}