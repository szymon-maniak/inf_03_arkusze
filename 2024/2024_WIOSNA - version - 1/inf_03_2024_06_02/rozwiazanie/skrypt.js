function wyslij(){
    document.getElementById('chat').innerHTML += "<section class='jolka'><img src='Jolka.jpg' alt='Jolanta Nowak'><p>" + document.getElementById('wiadomosc').value + "</p></section>";
    document.getElementById('chat').scrollTop = document.getElementById('chat').scrollWidth;
}

let odp_tab = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"
];

function odpowiedz(){
    let liczba = Math.floor(Math.random() * 9);
    document.getElementById('chat').innerHTML += "<section class='krzysiek'><img src='Krzysiek.jpg' alt='Krzysztof Łukasiński'><p>" + odp_tab[liczba] + "</p></section>";
    document.getElementById('chat').scrollTop = document.getElementById('chat').scrollHeight;
}