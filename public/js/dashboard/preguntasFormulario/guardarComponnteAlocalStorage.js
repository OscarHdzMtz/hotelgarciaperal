
function badId() {
    return (Math.random() * 100).toFixed(0);
}    

function getComponentYsaveInLocalStorage() {
    return {
        tareas: [],
        nuevaTarea: '',
        crearTarea: function() {
            this.tareas.push(this.nuevaTarea)
            this.nuevaTarea = ''
        },
        /* RECIBIMOS LOS COMPONENTES DE LAS PREGUNTAS PARA CONVERTIRLAS EN ARREGLO DE OBJETOS Y GURDARLAS EN LOCALS
        STORAGE PARA PODER EDITARLAS EN TIEMPO REAL */
        saveComponenteALocalStorage: function($enviarcomponentespreguntas, $idpregunta) {
            /* console.log($enviarcomponentespreguntas);
            console.log($idpregunta); */
            var receive = $enviarcomponentespreguntas;
            /* Convertimos el string de componentes de la BD a array */
            var stringConponenteAarray = receive.split('|')

            var arrayDeComponentes = [];
            for (let recorrerArray = 0; recorrerArray < stringConponenteAarray.length; recorrerArray++) {
                /* Guardamos los datos como objeto en el array */
                arrayDeComponentes[recorrerArray] = {
                    id: $idpregunta + recorrerArray,
                    text: stringConponenteAarray[recorrerArray]
                }
            }
            console.log(arrayDeComponentes);
            /* Almacenamos el array en el localStorage para poder agregar, editar e eliminar en tiempo real desde la edicion del formulario */
            localStorage.setItem("id" + $idpregunta + "pregunta", JSON.stringify(arrayDeComponentes));

            /* this.tareas  = new Array(array) */
        }
    }
}