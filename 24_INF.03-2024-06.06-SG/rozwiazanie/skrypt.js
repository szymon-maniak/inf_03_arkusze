function blok_1(){
    document.getElementById('blok_1').style.visibility = 'hidden';
    document.getElementById('blok_2').style.visibility = 'visible';
}

function blok_2(){
    document.getElementById('blok_2').style.visibility = 'hidden';
    document.getElementById('blok_3').style.visibility = 'visible';
}

function blok_3(){
    let pass_1 = document.getElementById('pass_1').value;
    let pass_2 = document.getElementById('pass_2').value;

    if(pass_1 != pass_2){
        alert('Podane hasła różnią się');
    }

    console.log('Witaj ' + document.getElementById('imie').value + ' ' + document.getElementById('nazwisko').value);
}