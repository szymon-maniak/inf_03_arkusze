function wyslij(){
    let blok_chat = document.getElementById('chat');
    let text = document.getElementById('wiadomosc').value;
    
    let wiadomosc = document.createElement("section");
    wiadomosc.classList.add("jolka");
    wiadomosc.innerHTML = "<img src='Jolka.jpg'><p>" + text + "</p>";
    blok_chat.appendChild(wiadomosc);
    wiadomosc.scrollIntoView();
}

let wypowiedzi = [
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

function losuj(){
    let liczba_los = Math.floor(Math.random() * 9);
    let blok_chat = document.getElementById('chat');
    
    let wiadomosc = document.createElement("section");
    wiadomosc.classList.add("krzysiek");
    wiadomosc.innerHTML = "<img src='Krzysiek.jpg'><p>" + wypowiedzi[liczba_los] + "</p>";
    blok_chat.appendChild(wiadomosc);
    wiadomosc.scrollIntoView();
}