function poprzednie_zdjecie() {
    const zdjecie = document.getElementById('zdjecie');
    const czesc_sciezki = zdjecie.src.split('/').pop();

    if(czesc_sciezki === "1.jpg"){
        zdjecie.src = "7.jpg";
    }
    else if(czesc_sciezki === "7.jpg"){
        zdjecie.src = "6.jpg";
    }
    else if(czesc_sciezki === "6.jpg"){
        zdjecie.src = "5.jpg";
    }
    else if(czesc_sciezki === "5.jpg"){
        zdjecie.src = "4.jpg";
    }
    else if(czesc_sciezki === "4.jpg"){
        zdjecie.src = "3.jpg";
    }
    else if(czesc_sciezki === "3.jpg"){
        zdjecie.src = "2.jpg";
    }
    else if(czesc_sciezki === "2.jpg"){
        zdjecie.src = "1.jpg";
    }
}

function nastepne_zdjecie() {
    const zdjecie = document.getElementById('zdjecie');
    const czesc_sciezki = zdjecie.src.split('/').pop();

    if(czesc_sciezki === "1.jpg"){
        zdjecie.src = "2.jpg";
    }
    else if(czesc_sciezki === "2.jpg"){
        zdjecie.src = "3.jpg";
    }
    else if(czesc_sciezki === "3.jpg"){
        zdjecie.src = "4.jpg";
    }
    else if(czesc_sciezki === "4.jpg"){
        zdjecie.src = "5.jpg";
    }
    else if(czesc_sciezki === "5.jpg"){
        zdjecie.src = "6.jpg";
    }
    else if(czesc_sciezki === "6.jpg"){
        zdjecie.src = "7.jpg";
    }
    else if(czesc_sciezki === "7.jpg"){
        zdjecie.src = "1.jpg";
    }
}
