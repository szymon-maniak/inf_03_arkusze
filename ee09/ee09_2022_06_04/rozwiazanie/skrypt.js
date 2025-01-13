// function zaznaczBraki(){
//     let pole1 = document.getElementById('pole1').innerHTML;
//     let pole2 = document.getElementById('pole2').innerHTML;
//     let pole3 = document.getElementById('pole3').innerHTML;
//     let pole4 = document.getElementById('pole4').innerHTML;
//     if(pole1 == 0) document.getElementById('pole1').style.backgroundColor = "red";
//     if(pole2 == 0) document.getElementById('pole2').style.backgroundColor = "red";
//     if(pole3 == 0) document.getElementById('pole3').style.backgroundColor = "red";
//     if(pole4 == 0) document.getElementById('pole4').style.backgroundColor = "red";
//     if(pole1 >= 1 && pole1 <= 5) document.getElementById('pole1').style.backgroundColor = "yellow";
//     if(pole2 >= 1 && pole2 <= 5) document.getElementById('pole2').style.backgroundColor = "yellow";
//     if(pole3 >= 1 && pole3 <= 5) document.getElementById('pole3').style.backgroundColor = "yellow";
//     if(pole4 >= 1 && pole4 <= 5) document.getElementById('pole4').style.backgroundColor = "yellow";
//     if(pole1 > 5) document.getElementById('pole1').style.backgroundColor = "Honeydew";
//     if(pole2 > 5) document.getElementById('pole2').style.backgroundColor = "Honeydew";
//     if(pole3 > 5) document.getElementById('pole3').style.backgroundColor = "Honeydew";
//     if(pole4 > 5) document.getElementById('pole4').style.backgroundColor = "Honeydew";
// }

function zaznaczBraki(){
    for (let i = 1; i <= 4; i++){
        let id = "pole" + i;
        let aktualny_wiersz = parseInt(document.getElementById(id).innerHTML);

        if (aktualny_wiersz == 0){
            document.getElementById(id).style.backgroundColor = "red";

        }
        else if (aktualny_wiersz >= 1 && aktualny_wiersz <= 5){
            document.getElementById(id).style.backgroundColor = "yellow";
        }
        else{
            document.getElementById(id).style.backgroundColor = "Honeydew";
        }
    }
}

zaznaczBraki();

function aktualizuj(wiersz){
    let nowa_ilosc = prompt("Podaj nową ilość: ");
    if(wiersz == 1) document.getElementById('pole1').innerHTML = nowa_ilosc;
    else if(wiersz == 2) document.getElementById('pole2').innerHTML = nowa_ilosc;
    else if(wiersz == 3) document.getElementById('pole3').innerHTML = nowa_ilosc;
    else if(wiersz == 4) document.getElementById('pole4').innerHTML = nowa_ilosc;
    zaznaczBraki();
}

let id_zamowienia = 0;
function zamow(wiersz){
    id_zamowienia++;

    let nazwa = "";
    if(wiersz == 1) nazwa = document.getElementById('prod1').innerHTML;
    else if(wiersz == 2) nazwa = document.getElementById('prod2').innerHTML;
    else if(wiersz == 3) nazwa = document.getElementById('prod3').innerHTML;
    else if(wiersz == 4) nazwa = document.getElementById('prod4').innerHTML;
    
    alert("Zamówienie nr: " + id_zamowienia + " Produkt: " + nazwa);
}