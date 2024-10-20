function przeslij(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let e_mail = document.getElementById('e-mail').value;
    let uslugi = document.getElementById('uslugi').value;

    document.getElementById('wynik').innerHTML = imie + "<br>" + nazwisko + "<br>" + e_mail + "<br>" + "Usługa: " + uslugi;
}