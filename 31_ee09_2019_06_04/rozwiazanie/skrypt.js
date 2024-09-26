function dodawanie(){
    let liczba_A = parseInt(document.getElementById('liczba_A').value);
    let liczba_B = parseInt(document.getElementById('liczba_B').value);

    let wynik = parseInt(liczba_A + liczba_B);
    document.getElementById('wynik').innerHTML = "Wynik: " + wynik;
}

function odejmowanie(){
    let liczba_A = parseInt(document.getElementById('liczba_A').value);
    let liczba_B = parseInt(document.getElementById('liczba_B').value);

    let wynik = parseInt(liczba_A - liczba_B);
    document.getElementById('wynik').innerHTML = "Wynik: " + wynik;
}

function mnozenie(){
    let liczba_A = parseInt(document.getElementById('liczba_A').value);
    let liczba_B = parseInt(document.getElementById('liczba_B').value);

    let wynik = parseInt(liczba_A * liczba_B);
    document.getElementById('wynik').innerHTML = "Wynik: " + wynik;
}

function dzielenie(){
    let liczba_A = parseInt(document.getElementById('liczba_A').value);
    let liczba_B = parseInt(document.getElementById('liczba_B').value);

    let wynik = parseInt(liczba_A / liczba_B);
    document.getElementById('wynik').innerHTML = "Wynik: " + wynik;
    if(liczba_B==0){
        document.getElementById('wynik').innerHTML = "pamiętaj cholero nie dziel przez 0";
    }
}

function potegowanie(){
    let liczba_A = parseInt(document.getElementById('liczba_A').value);
    let liczba_B = parseInt(document.getElementById('liczba_B').value);

    let wynik = parseInt(liczba_A ** liczba_B);
    document.getElementById('wynik').innerHTML = "Wynik: " + wynik;
}