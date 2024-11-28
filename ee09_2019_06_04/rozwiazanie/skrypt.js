function wybor(liczba){
    if(liczba == 1) document.getElementById('wynik').innerHTML = "Wynik: " + parseInt(parseInt(document.getElementById('liczba_A').value) + parseInt(document.getElementById('liczba_B').value));
    else if(liczba == 2) document.getElementById('wynik').innerHTML = "Wynik: " + parseInt(parseInt(document.getElementById('liczba_A').value) - parseInt(document.getElementById('liczba_B').value));
    else if(liczba == 3) document.getElementById('wynik').innerHTML = "Wynik: " + parseInt(parseInt(document.getElementById('liczba_A').value) * parseInt(document.getElementById('liczba_B').value));
    else if(liczba == 4) document.getElementById('wynik').innerHTML = "Wynik: " + parseInt(parseInt(document.getElementById('liczba_A').value) / parseInt(document.getElementById('liczba_B').value));
    else if(liczba == 5){
        let liczba_A = parseInt(document.getElementById('liczba_A').value);
        let liczba_B = parseInt(document.getElementById('liczba_B').value);
        let wynik = 1;
        for (let index = 1; index <= liczba_B; index++) {
            wynik = wynik * liczba_A;  
        }
        document.getElementById('wynik').innerHTML = "Wynik: " + wynik;
    }
}