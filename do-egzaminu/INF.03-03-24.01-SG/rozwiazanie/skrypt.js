function przeslij(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let e_mail = document.getElementById('e-mail').value;
    let zgloszenie = document.getElementById('zgloszenie').value;

    if(!document.getElementById('wybor').checked){
        document.getElementById('wynik').style.color = "red";
        document.getElementById('wynik').innerHTML = "Musisz zapoznać się z regulaminem";
    }
    else if(document.getElementById('wybor').checked){
        document.getElementById('wynik').style.color = "navy";
        let wielkiImie = imie.toUpperCase();
        let wielkiNazwisko = nazwisko.toUpperCase();
        document.getElementById('wynik').innerHTML = wielkiImie + " " + wielkiNazwisko + "<br>Treść Twojej sprawy: " + zgloszenie + ".";
    }
}