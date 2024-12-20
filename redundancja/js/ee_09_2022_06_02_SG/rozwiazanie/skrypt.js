function paleta(){
    let kolor = parseInt(document.getElementById('numery').value);
    document.getElementById('d1').style = 'background-color: hsl(' + kolor + ', 100%, 50%);';
    document.getElementById('d2').style = 'background-color: hsl(' + kolor + ', 80%, 50%);';
    document.getElementById('d3').style = 'background-color: hsl(' + kolor + ', 60%, 50%);';
    document.getElementById('d4').style = 'background-color: hsl(' + kolor + ', 40%, 50%);';
    document.getElementById('d5').style = 'background-color: hsl(' + kolor + ', 20%, 50%);';
}