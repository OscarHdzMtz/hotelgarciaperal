<div id="{{ $item->id . 100 }}" style="display: none; margin-left: -10px" class="border-l-4 border-indigo-500"
    x-data="{ selecttipodato: '{{ $item->tipodedatos }}' }">
    @php
        /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
        $valorcomponenteArray = explode('|', $item->valordecomponente);
        $setcomponentepregunta = $item->valordecomponente;
        /* $setcomponentepregunta = $getpregunta[0]['valordecomponente']; */
        $idpregunta = $item->id;
        $idformulario = $item->formulario_id;
        $idPreguntaLocalStorage = 'id' . $item->id . 'pregunta';
        $nombreFormulario = $getDateFormulario[0]['nombre'];
        /* $idPreguntaLocalStorage = 'id' . $getpregunta[0]['id'] . 'pregunta'; */
    @endphp
    <div x-data="{ enviarcomponentespreguntas: '{{ $setcomponentepregunta }}', id: '{{ $idpregunta }}' }" class="container px-4 mx-auto mt-5 {{-- bg-red-400  --}}rounded">
        <div x-data="getComponentYsaveInLocalStorage()" x-init="saveComponenteALocalStorage(enviarcomponentespreguntas, id)" class="py-6 mb-5 px-7">
            <div x-data="{ selects: '{{ $item->tipodecomponente }}' }" {{-- class="flex flex-wrap" --}}
                class="grid grid-cols-1 gap-5 mb-5 md:gap-15 md:grid-cols-2">
                {{-- <div class="w-full mb-10 md:w-1/2 md:mb-0"> --}}
                <div class="">
                    <div class="mx-1 mb-6">
                        <label for="success"
                            class="block mb-2 font-semibold text-green-700 text-md dark:text-green-500">Pregunta</label>
                        <input type="text" name="pregunta" id="pregunta-{{ $idpregunta }}"
                            class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                            value='{!! $item->pregunta != '' ? $item->pregunta : 'Ingrese la pregunta' !!}'>
                    </div>
                    <template x-if="selects === 'input'">
                        <div class="mx-10 mb-6">
                            <label for="success"
                                class="block mb-2 font-semibold text-green-700 text-md dark:text-green-500">Tipo de
                                respúesta para la pregunta</label>

                            <input type="text" name="pregunta"
                                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500">
                        </div>
                    </template>
                    <template x-if="selects === 'textarea'">
                        <div class="mx-5">
                            <label for="success"
                                class="block mb-2 font-semibold text-green-700 text-md dark:text-green-500">Tipo de
                                respúesta para la pregunta</label>
                            <textarea id="" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border focus:ring-green-500 focus:border-green-500 border-green-600 dark:bg-gray-700 dark:border-green-500""></textarea>
                        </div>
                    </template>
                    <template x-if="selects === 'radio'">
                        <div x-data="{
                            newTodo: '',
                            {{ $idPreguntaLocalStorage }}: JSON.parse(localStorage.getItem('{{ $idPreguntaLocalStorage }}') || '[]')
                        }" x-init="$watch('{{ $idPreguntaLocalStorage }}', (val) => localStorage.setItem('{{ $idPreguntaLocalStorage }}', JSON.stringify(val)))">
                            <div>
                                <form
                                    @submit.stop.prevent="{{ $idPreguntaLocalStorage }} = [].concat({ id: {{ $item->id }} + badId(), text: newTodo }, {{ $idPreguntaLocalStorage }}); newTodo = '';">
                                    <div class="flex items-center py-2 border-b border-teal-500">
                                        <input
                                            class="w-full px-2 py-1 mr-3 font-semibold leading-tight text-green-600 bg-transparent border-none appearance-none text-md focus:outline-none"
                                            placeholder="Agregar una opcion " x-model="newTodo">
                                        <button
                                            class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">
                                            Agregar
                                        </button>

                                    </div>
                                </form>
                                <ul class="mt-3 mb-2 border-2 border-teal-500">
                                    <label for="success"
                                        class="block mt-2 mb-2 ml-3 font-semibold text-green-500 text-md dark:text-green-500">Opciones
                                        agregadas</label>
                                    <template x-for="todo in {{ $idPreguntaLocalStorage }}" :key="todo.id">
                                        <li class="ml-3 mr-3">
                                            {{-- <span x-text="todo.text"></span> --}}
                                            <div
                                                class="flex items-center pl-4 mt-2 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" type="radio" value=""
                                                    name="bordered-radio"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label name="prueba" for="bordered-radio-1"
                                                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-700"
                                                    x-text="todo.text"></label>
                                                <button
                                                    class="px-4 py-2 mr-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                                    @click="{{ $idPreguntaLocalStorage }} = {{ $idPreguntaLocalStorage }}.filter(t => t.id !== todo.id)">x</button>
                                            </div>
                                        </li>
                                    </template>
                                    <div class="mt-3 mb-3 ml-3 mr-3">
                                        <button
                                            class="px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                            @click="{{ $idPreguntaLocalStorage }} = []; localStorage.removeItem('{{ $idPreguntaLocalStorage }}');">
                                            Borrar todas las opciones
                                        </button>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </template>
                    <template x-if="selects === 'checkbox'">
                        <div x-data="{
                            newTodo: '',
                            {{ $idPreguntaLocalStorage }}: JSON.parse(localStorage.getItem('{{ $idPreguntaLocalStorage }}') || '[]')
                        }" x-init="$watch('{{ $idPreguntaLocalStorage }}', (val) => localStorage.setItem('{{ $idPreguntaLocalStorage }}', JSON.stringify(val)))">
                            <div>
                                <form
                                    @submit.stop.prevent="{{ $idPreguntaLocalStorage }} = [].concat({ id: {{ $item->id }} + badId(), text: newTodo }, {{ $idPreguntaLocalStorage }}); newTodo = '';">
                                    <div class="flex items-center py-2 border-b border-teal-500">
                                        <input
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Agregar una opcion " x-model="newTodo">
                                        <button
                                            class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">
                                            Agregar
                                        </button>
                                    </div>
                                </form>
                                <ul class="mt-3 mb-2 border-2 border-teal-500">
                                    <div class="ml-3">
                                        Opciones agregadas:
                                    </div>
                                    <template x-for="todo in {{ $idPreguntaLocalStorage }}" :key="todo.id">
                                        <li class="mb-3 ml-3">
                                            <div class="block pt-1 mt-1 min-h-6 pl-7">
                                                <label>
                                                    <input id="checkbox-1"
                                                        class="w-5 h-5 ease-soft text-base -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                                        type="checkbox" />
                                                    <label for="checkbox-1"
                                                        class="cursor-pointer select-none text-slate-700"
                                                        x-text="todo.text"></label>
                                                </label>
                                                <button
                                                    class="px-4 py-2 mr-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                                    @click="{{ $idPreguntaLocalStorage }} = {{ $idPreguntaLocalStorage }}.filter(t => t.id !== todo.id)">x</button>
                                            </div>
                                        </li>
                                    </template>
                                    <div class="mt-3 mb-3 ml-3 mr-3">
                                        <button
                                            class="px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                            @click="{{ $idPreguntaLocalStorage }} = []; localStorage.removeItem('{{ $idPreguntaLocalStorage }}');">
                                            Borrar todas las opciones
                                        </button>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </template>
                    <template x-if="selects === 'select'">
                        <div x-data="{
                            newTodo: '',
                            {{ $idPreguntaLocalStorage }}: JSON.parse(localStorage.getItem('{{ $idPreguntaLocalStorage }}') || '[]')
                        }" x-init="$watch('{{ $idPreguntaLocalStorage }}', (val) => localStorage.setItem('{{ $idPreguntaLocalStorage }}', JSON.stringify(val)))">
                            <div>
                                <form
                                    @submit.stop.prevent="{{ $idPreguntaLocalStorage }} = [].concat({ id: {{ $item->id }} + badId(), text: newTodo }, {{ $idPreguntaLocalStorage }}); newTodo = '';">
                                    <div class="flex items-center py-2 border-b border-teal-500">
                                        <input
                                            class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                                            placeholder="Agregar una opcion " x-model="newTodo">
                                        <button
                                            class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700">
                                            Agregar
                                        </button>
                                    </div>
                                </form>
                                <ul class="mt-3 mb-2 border-2 border-teal-500">
                                    <div class="ml-3">
                                        Opciones agregadas:
                                    </div>
                                    <template x-for="todo in {{ $idPreguntaLocalStorage }}" :key="todo.id">
                                        <li class="mb-3">
                                            <div class="block pt-1 mt-1 min-h-6 pl-7">
                                                <label>
                                                    -.
                                                    <label for="checkbox-1"
                                                        class="cursor-pointer select-none text-slate-700"
                                                        x-text="todo.text"></label>
                                                </label>
                                                <button
                                                    class="px-4 py-2 mr-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                                    @click="{{ $idPreguntaLocalStorage }} = {{ $idPreguntaLocalStorage }}.filter(t => t.id !== todo.id)">x</button>
                                            </div>
                                        </li>
                                    </template>
                                    <div class="mt-3 mb-3 ml-3 mr-3">
                                        <button
                                            class="px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                            @click="{{ $idPreguntaLocalStorage }} = []; localStorage.removeItem('{{ $idPreguntaLocalStorage }}');">
                                            Borrar todas las opciones
                                        </button>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </template>
                    <div class="mt-5 mb-3">
                        <div
                            class="grid grid-cols-1 gap-3 mx-auto bg-gray-300 border-2 border-teal-500 rounded md:px-10 md:py-5 md:grid-cols-2">
                            <div>
                                <label for="">Obligatorio</label>
                                <input id="obligatorio-{{ $idpregunta }}" name="obligatorio" type="checkbox"
                                    {{ $item->campoobligatorio == 1 ? "checked='checked'" : '' }}>
                            </div>
                            <div>
                                <template x-if="selects === 'radio' || selects === 'checkbox'">
                                    <div>
                                        <label for="">Asignar Puntuacion</label>
                                        <input id="asignarpuntuacion-{{ $idpregunta }}" name="asignarpuntuacion	"
                                            type="checkbox"
                                            {{ $item->asignarpuntuacion == 1 ? "checked='checked'" : '' }}>
                                    </div>
                                </template>
                                <template x-if="selects === 'input' && selecttipodato === 'number'">
                                    <div>
                                        <label for="">Asignar Puntuacion</label>
                                        <input id="asignarpuntuacion-{{ $idpregunta }}" name="asignarpuntuacion	"
                                            type="checkbox"
                                            {{ $item->asignarpuntuacion == 1 ? "checked='checked'" : '' }}>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div {{-- class="w-full mb-10 ml-5 md:w-1/4 md:mb-0" --}} {{-- x-data="{ selecttipodato: '{{ $item->tipodedatos }}' }" --}}>
                    <div class="mx-3">
                        <label for="success"
                            class="block mb-2 font-semibold text-green-700 text-md dark:text-green-500">Tipo de
                            componente de respuesta</label>
                        <select id="tipodecomponente-{{ $idpregunta }}" name="tipodecomponente" x-model="selects"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="input"
                                {{ $item->tipodecomponente === 'input' ? 'selected="selected"' : '' }}>
                                texto corto
                            </option>
                            <option value="textarea"
                                {{ $item->tipodecomponente === 'textarea' ? 'selected="selected"' : '' }}
                                {{-- x-on:click="selects = 'textarea'" --}}>
                                Parrafo
                            </option>
                            <option value="radio"
                                {{ $item->tipodecomponente === 'radio' ? 'selected="selected"' : '' }}>
                                Opcion
                                multiple
                            </option>
                            <option value="checkbox"
                                {{ $item->tipodecomponente === 'checkbox' ? 'selected="selected"' : '' }}>
                                Casilla
                                de
                                Verificacion</option>
                            <option value="select"
                                {{ $item->tipodecomponente === 'select' ? 'selected="selected"' : '' }}>
                                Lista
                                desplegable</option>
                        </select>
                        {{-- <span x-text="selects"></span> --}}
                        <template x-if="selects === 'input'">
                            <div class="mt-3 mb-5">
                                <label for="success"
                                    class="block mb-2 font-semibold text-green-700 text-md dark:text-green-500">Tipo de
                                    datos a aceptar</label>
                                <select id="tipodedatos-{{ $idpregunta }}" name="tipodedatos"
                                    x-model="selecttipodato" required
                                    class="bg-gray-50 mt-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Selecciona una opcion</option>
                                    <option value="text">Texto</option>
                                    <option value="number">Numero</option>
                                    <option value="email">Correo</option>
                                    <option value="password">Contraseña</option>
                                    <option value="datetime-local">Fecha y Hora</option>
                                    <option value="date">Fecha</option>
                                    <option value="time">Hora</option>
                                    <option value="tel">Celular</option>
                                    <option value="url">URL</option>
                                    <option value="color">Color</option>
                                    <option value="file">Archivo</option>
                                </select>
                                <template x-if="selecttipodato === 'text' || selecttipodato === 'tel'">
                                    <div>
                                        <label for="success"
                                            class="block mb-2 font-semibold text-green-700 text-md dark:text-green-500">Numero
                                            minimo y maximo de caracter</label>
                                        <div class="grid grid-cols-2 gap-3 mt-3">
                                            <div>
                                                <input id="mindecaracteres-{{ $idpregunta }}" type="number"
                                                    name="mindecaracteres"
                                                    class="bg-green-50 border text-center border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                                                    placeholder="Minino de Caracter"
                                                    value="{{ $item->mindecaracteres }}">
                                            </div>
                                            <div>
                                                <input id="maxdecaracteres-{{ $idpregunta }}" type="number"
                                                    name="maxdecaracteres"
                                                    class="bg-green-50 border text-center border-green-500 text-black dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                                                    placeholder="Maximo de caracter"
                                                    value="{{ $item->maxdecaracteres }}">
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <button type="submit"
                onclick="editarDatosPregunta('{{ $idPreguntaLocalStorage }}', '{{ $idpregunta }}', '{{ $idformulario }}', '{{ $nombreFormulario }}')"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                cambios</button>
            {{-- </form> --}}
        </div>
    </div>
</div>
<script>
    function editarDatosPregunta($id, $idpregunta, $idformulario, $nombreFormulario) {
        var pregunta_id = $idpregunta
        var formulario_id = $idformulario
        var arrayValorComponente = JSON.parse(localStorage.getItem($id))
        var nombreFormulario = "FORMULARIO 201"
        var pregunta = document.getElementById('pregunta-' + pregunta_id).value;
        var obligatorio = document.getElementById('obligatorio-' + pregunta_id);
        var tipodecomponente = document.getElementById('tipodecomponente-' + pregunta_id).value;
        var asignarpuntuacion = document.getElementById('asignarpuntuacion-' + pregunta_id);                
        
        //
        if (asignarpuntuacion == null) {                    
            asignarpuntuacion= false            
        }else{
            asignarpuntuacion = asignarpuntuacion.checked
        }

        if (tipodecomponente == "input") {
            var tipodedatos = document.getElementById('tipodedatos-' + pregunta_id).value;
            if (tipodedatos == "text" || tipodedatos == "tel") {
                var mindecaracteres = document.getElementById('mindecaracteres-' + pregunta_id).value;
                var maxdecaracteres = document.getElementById('maxdecaracteres-' + pregunta_id).value;
            }
        }

        var valorcomponente = [];
        for (let index = 0; index < arrayValorComponente.length; index++) {
            valorcomponente[index] = arrayValorComponente[index].text //+ "|"
            console.log(valorcomponente[index]);
        }
        let stringcomponente = valorcomponente.toString();
        //console.log(pregunta);
        // Envío de la variable al servidor Laravel mediante una solicitud AJAX

        axios.put("{{ route('editpreguntasformularios', ['id' => $idformulario, 'nombre' => $nombreFormulario]) }}", {
                pregunta_id: pregunta_id,
                formulario_id: formulario_id,
                valordecomponente: stringcomponente,
                pregunta: pregunta,
                obligatorio: obligatorio.checked,
                tipodecomponente: tipodecomponente,
                tipodedatos: tipodedatos,
                mindecaracteres: mindecaracteres,
                maxdecaracteres: maxdecaracteres,                 
                asignarpuntuacion: asignarpuntuacion                
                /* asignarpuntuacion =! null ? asignarpuntuacion.checked: asignarpuntuacion */
                /* asignarpuntuacion: asignarpuntuacion.checked                 */
            })
            .then(function(response) {
                // La solicitud AJAX se completó correctamente
                console.log('datos guardados.');
                //RECARGAR LA PAGINA SI SE OBTUVO RESPUESTA
                window.location.reload()
            })
            .catch(function(error) {
                // Se produjo un error al enviar la variable
                alert.error('Error al redireccionar la pagina');
            });
    }
</script>
