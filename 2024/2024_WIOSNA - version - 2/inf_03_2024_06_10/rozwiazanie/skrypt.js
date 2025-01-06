function widocznoscCytatu(cytat){
    document.getElementById('cytat1').style.display = "none";
    document.getElementById('cytat2').style.display = "none";
    document.getElementById('cytat3').style.display = "none";
    if(cytat == 1){
        document.getElementById('cytat1').style.display = "block";
    } else if(cytat == 2){
        document.getElementById('cytat2').style.display = "block";
    } else if(cytat == 3){
        document.getElementById('cytat3').style.display = "block";
    }
}