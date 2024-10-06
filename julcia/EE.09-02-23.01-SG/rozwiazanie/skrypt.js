let nr = 1;

function prev(){
    nr --;
    if(nr == 0) nr = 5;
    if(nr == 1) document.getElementById('glowne').src = '1.jpg';
    if(nr == 2) document.getElementById('glowne').src = '2.jpg';
    if(nr == 3) document.getElementById('glowne').src = '3.jpg';
    if(nr == 4) document.getElementById('glowne').src = '4.jpg';
    if(nr == 5) document.getElementById('glowne').src = '5.jpg';
}

function next(){
    nr ++;
    if(nr == 6) nr = 1;
    if(nr == 1) document.getElementById('glowne').src = '1.jpg';
    if(nr == 2) document.getElementById('glowne').src = '2.jpg';
    if(nr == 3) document.getElementById('glowne').src = '3.jpg';
    if(nr == 4) document.getElementById('glowne').src = '4.jpg';
    if(nr == 5) document.getElementById('glowne').src = '5.jpg';
}

function zamiana(src, numer){
    document.getElementById('glowne').src = src;
    nr = numer;
}