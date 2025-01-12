function wyslij(){
    let text = document.getElementById('wiadomosc').value;
    let wiadomosc = document.createElement('section');
    wiadomosc.classList.add('jolka');
    wiadomosc.innerHTML = "<img src='Jolka.jpg'><p>" + text + "</p>";
    document.getElementById('chat').appendChild(wiadomosc);
    wiadomosc.scrollIntoView();
}

let odp = [
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

function losowa_odpowiedz(){
    let losowa = Math.floor(Math.random() * 9);
    let wiadomosc = document.createElement('section');
    wiadomosc.classList.add('krzysiek');
    wiadomosc.innerHTML = "<img src='Krzysiek.jpg'><p>" + odp[losowa] + "</p>";
    document.getElementById('chat').appendChild(wiadomosc);
    wiadomosc.scrollIntoView();
}