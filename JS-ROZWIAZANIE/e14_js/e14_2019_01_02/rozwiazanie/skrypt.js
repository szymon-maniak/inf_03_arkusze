function funkcja(kolor){
    let paragraf = document.getElementById('paragraf');
    let rozmiar = document.getElementById('rozmiar').value;
    let typ = document.getElementById('typ').value;

    paragraf.style.color = kolor;
    paragraf.style.fontSize = rozmiar + "%";
    paragraf.style.fontStyle = typ;
}