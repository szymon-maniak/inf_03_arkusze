function kolor_tla(color_tla){
    document.getElementById('prawy').style.backgroundColor = color_tla;
}

function kolor_czcionki(){
    let kolor = document.getElementById('czcionka_kolor').value;
    document.getElementById('prawy').style.color = kolor;
}

function rozmiar_czcionki(){
    let rozmiar = document.getElementById('czcionka_rozmiar').value;
    document.getElementById('prawy').style.fontSize = rozmiar + '%';
}

function obramowanie_obrazu(){
    if(!document.getElementById('obramowanie').checked){
        document.getElementById('obraz').style.border = 'none';
    }
    else{
        document.getElementById('obraz').style.border = "1px solid white";
    }
}

function formatowanie_punktora(wybor){
    if(wybor == 1){
        document.getElementById('punktor').style.listStyleType = 'disc';
    }
    else if(wybor == 2){
        document.getElementById('punktor').style.listStyle = 'square';
    }
    else if(wybor == 3){
        document.getElementById('punktor').style.listStyleType = 'circle';
    }
}