let liczba = 1;

function next(){
    liczba++;
    if(liczba == 6) liczba = 1;
    if(liczba == 1) document.getElementById('zdjecie').src = "1.jpg";
    if(liczba == 2) document.getElementById('zdjecie').src = "2.jpg";
    if(liczba == 3) document.getElementById('zdjecie').src = "3.jpg";
    if(liczba == 4) document.getElementById('zdjecie').src = "4.jpg";
    if(liczba == 5) document.getElementById('zdjecie').src = "5.jpg";
}

function prev(){
    liczba--;
    if(liczba == 0) liczba = 5;
    if(liczba == 1) document.getElementById('zdjecie').src = "1.jpg";
    if(liczba == 2) document.getElementById('zdjecie').src = "2.jpg";
    if(liczba == 3) document.getElementById('zdjecie').src = "3.jpg";
    if(liczba == 4) document.getElementById('zdjecie').src = "4.jpg";
    if(liczba == 5) document.getElementById('zdjecie').src = "5.jpg";
}

function zmiana(numer){
    if(numer == 1){
        document.getElementById('zdjecie').src = "1.jpg";
        liczba = 1;
    }
    else if(numer == 2){
        document.getElementById('zdjecie').src = "2.jpg";
        liczba = 2;
    }
    else if(numer == 3){
        document.getElementById('zdjecie').src = "3.jpg";
        liczba = 3;
    }
    else if(numer == 4){
        document.getElementById('zdjecie').src = "4.jpg";
        liczba = 4;
    }
    else if(numer == 5){
        document.getElementById('zdjecie').src = "5.jpg";
        liczba = 5;
    }
}