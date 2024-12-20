function oblicz(){
    let A1 = parseInt(document.getElementById('A1').value);
    let R = parseInt(document.getElementById('R').value);
    let N = parseInt(document.getElementById('N').value);

    document.getElementById('wynik').innerHTML = "Ciąg arytmetyczny zawiera wyrazy: ";
    for (let index = 1; index <= N; index++) {
        let AN = A1 + ((index-1)*R);
        document.getElementById('wynik').innerHTML += AN + ", ";
    }
}