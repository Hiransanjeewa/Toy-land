

function changeUnits(x) {

    if (x===1) {
        if (units>1) {
            units --;
        }
    }else if(x===2){
        if (units < max) {
            units += 1; 
        }
    }
    document.getElementById('units').innerHTML= "&nbsp;"+units ;
    changeShipping();  
}


    


