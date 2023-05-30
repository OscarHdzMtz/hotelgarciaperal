function MostrarOcultarDiv($idshow, $idedit, $allPreguntas) {
    var x = document.getElementById($idshow);
    var y = document.getElementById($idedit);
    //CONVERTIMOS EL STRING EN ARRAY PARA OBTENER LOS ID
    var allPreguntasArray = $allPreguntas.split('|');

    for (let index = 0; index < allPreguntasArray.length - 1; index++) {
        //ONTENEMOS LOS ID DE LOS DIV QUE VIENE EN EL ARREGLO DE ACUERDO AL FOR
        var idrecorrido = allPreguntasArray[index]

        //DE ACUERDO AL VALOR OBTENIDO OBTENEMOS EL DIV COMO TAL DE LA PREGUNTA
        var dividrecorridoshow = document.getElementById(idrecorrido);

        //VALOR DEL DIV DE EDICION 
        var ideditrecorrido = idrecorrido + 100;
        
        //OBTENEMOS EL DIV DE LA PREGUNTA PARA EDICION
        var dividrecorridoedit = document.getElementById(ideditrecorrido);                

        if (ideditrecorrido == $idedit) {
            /* x.style.display = "none" */
            if (dividrecorridoshow.style.display === "none" && dividrecorridoedit.style.display === "block") {
                dividrecorridoshow.style.display = "block"
                dividrecorridoedit.style.display = "none"
            } else {
                dividrecorridoshow.style.display = "none"
                dividrecorridoedit.style.display = "block"
            }
        } else {
            dividrecorridoshow.style.display = "block"
            dividrecorridoedit.style.display = "none"
        }
    }
    /* if (x.style.display === "none" && y.style.display === "block") {
        x.style.display = "block";
        console.log("entroprue")
        y.style.display = "none"
    if (x.style.display === "none" && y.style.display === "none") {
        y.style.display = "block"
    }
    } else {
        x.style.display = "none";
        y.style.display = "block"
    } */
}