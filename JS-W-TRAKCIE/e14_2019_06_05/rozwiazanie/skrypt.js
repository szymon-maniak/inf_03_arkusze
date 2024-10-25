function formularz(){
    let zgoda = document.getElementById('zgoda').checked;
    if(zgoda){
        let imie = (document.getElementById('imie').value).toUpperCase();
        let nazwisko = (document.getElementById('nazwisko').value).toUpperCase();
        let usluga = document.getElementById('usluga').value;
        document.getElementById('wynik').innerHTML = "<p>" + imie + " " + nazwisko + "<br>" + "Treść Twojej sprawy: " + usluga + "<br>" + "Na podany e-mail zostanie wysłana oferta" + "</p>";
    }
    else{
        document.getElementById('wynik').innerHTML = "<span style='color: red;'>Musisz zapoznać się z regulaminem</span>";
    }
}