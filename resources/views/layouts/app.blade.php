<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-inter bg-slate-100 text-slate-600" :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden">

        <x-app.sidebar />

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if ($attributes['background']) {{ $attributes['background'] }} @endif"
            x-ref="contentarea">

            <x-app.header />

            <main>
                {{ $slot }}
            </main>

        </div>

    </div>
    <script>
        function badId() {
            return (Math.random() * 100).toFixed(0);
        }
    </script>
    <script>
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
    </script>
    {{-- Mostrar y Ocultar el Div de las preguntas para poder editar ahi mismo --}}    
    <script src="{{ asset('js/dashboard/mostrarOcultarPreguntasForm.js') }}"></script>
    {{-- Editar datos de preguntas formulario en la base de datos --}}
    <script src="{{ asset('js/dashboard/preguntasFormulario/editarDatosPreguntas.js') }}"></script>

    @livewireScripts
</body>

</html>
