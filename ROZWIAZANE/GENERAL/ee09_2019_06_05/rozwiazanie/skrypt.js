function oblicz(){
    let a1 = parseInt(document.getElementById('wyraz_A1').value);
    let r = parseInt(document.getElementById('roznica_R').value);
    let n = parseInt(document.getElementById('liczba_N').value);
    let text = "Ciąg arytmetycznty zawiera wyrazy: " + a1 + " ";

    for(let i = 1; i < n; i++){
        a1 += r;
        text += a1 + " ";
    }
    document.getElementById('wynik').innerHTML = text;
}