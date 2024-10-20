function wyslij(){
    let text = document.getElementById("text").value;

    document.getElementById("chat").innerHTML += '<div id="jolka">' + '<img src="Jolka.jpg" alt="Jolanta Nowak">' + '<p>' + text + '</p>' + '</div>';
}

function odp(){
    let odpowiedz = [
        "Tak, jutro się widzimy!",
        "Nie jestem pewien, ale postaram się.",
        "Na pewno, już się cieszę!",
        "Muszę sprawdzić swój kalendarz.",
        "Nie mam planów, więc pewnie tak.",
        "Brzmi świetnie, do zobaczenia!",
        "Może innym razem.",
        "Tak, chętnie pójdę!",
        "Zdecydowanie tak!"
    ];

    let losowanie = Math.floor(Math.random()*9);
    let losowa_odp = odpowiedz[losowanie]


    document.getElementById("chat").innerHTML += '<div id="krzysiek">' + '<img src="Krzysiek.jpg" alt="Krzysztof Łukasiński">' + '<p>' + losowa_odp + '</p>' + '</div>';

    document.getElementById("chat").scrollIntoView(false);
}