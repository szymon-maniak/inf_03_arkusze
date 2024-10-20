let odp_krzysia = [ 
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"];

function wyslij(){
    let wiadomosc = document.getElementById('wiadomosc').value;
    document.getElementById('czat').innerHTML += "<div class='jolanta'>" + "<img src='Jolka.jpg'>" + "<p>" + wiadomosc + "</p>" + "</div>";
    document.getElementById('czat').scrollTop = document.getElementById('czat').scrollHeight;
}

function losowanie(){
    let liczba = Math.floor(Math.random() * 9);
    document.getElementById('czat').innerHTML += "<div class='krzysiek'>" + "<img src='Krzysiek.jpg'>" + "<p>" + odp_krzysia[liczba] + "</p>" + "</div>";
    document.getElementById('czat').scrollTop = document.getElementById('czat').scrollHeight;
}