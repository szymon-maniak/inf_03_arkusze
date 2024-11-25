function oblicz(){
    let dystans = document.getElementById('dystans').value;
    let spalanie = document.getElementById('spalanie').value;
    let litry = (spalanie/100) * dystans;
    document.getElementById('wynik').innerHTML = "Potrzebujesz: " + litry + " litrów paliwa";
}