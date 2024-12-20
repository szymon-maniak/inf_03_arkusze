function zdjecia(miniatura){
    if(miniatura == 1){
        document.getElementById('glowny').innerHTML = "<img src='lanzarotte.jpg'>";
    }
    else if(miniatura == 2){
        document.getElementById('glowny').innerHTML = "<img src='pekin.jpg'>";
    }
    else if(miniatura == 3){
        document.getElementById('glowny').innerHTML = "<img src='serengeti.jpg'>";
    }
    else if(miniatura == 4){
        document.getElementById('glowny').innerHTML = "<img src='wenecja.jpg'>";
    }
    else if(miniatura == 5){
        document.getElementById('glowny').innerHTML = "<img src='tajlandia.jpg'>";
    }
}

function ikonka(){
    document.getElementById('polub').innerHTML = "<img src='icon-on.png' onclick='ikonka1()''>";
}

function ikonka1(){
    document.getElementById('polub').innerHTML = "<img src='icon-off.png' onclick='ikonka()''>";
}