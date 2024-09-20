function wyslij(){
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let mail = document.getElementById("mail").value;
    let usluga = document.getElementById("usluga").value;

    document.getElementById("wynik").innerHTML = imie + " " + nazwisko + "<br>" + mail.toLowerCase() + "<br>" + "Usługa: " + usluga;
}