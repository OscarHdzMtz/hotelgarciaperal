<div>
    {{-- PASASMOS LA VARIABLE $nombreImg que estamos recibiendo desde el controlador y lo recibimos en app/view/banner.php para poder recibirlo en el componente banner resource/views/component/banner.blade.php --}}
    <x-banner :nameImg="$getDateFormulario" />

    <x-jet-button class="bg-indigo-700" wire:click="agregarPregunta">
        <svg class="w-5 h-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <circle cx="12" cy="12" r="9" />
            <line x1="9" y1="12" x2="15" y2="12" />
            <line x1="12" y1="9" x2="12" y2="15" />
        </svg>
        Agregar pregunta
    </x-jet-button>

    {{-- <x-divpreguntas :allPreguntas="$getAllPreguntas"> --}}

    {{-- </x-divpreguntas>     --}}
    <div class="mt-5">
        @foreach ($getAllPreguntas as $item)
            <div class="container px-4 mx-auto mt-5 rounded bg-slate-100">
                {{-- <div> --}}
                {{-- @livewire('formulario.editarpreguntas', ['idpregunta' => $item->id]) --}}
                {{-- <livewire:formulario.editarpreguntas :idpregunta="$item->id" :wire:key="$item->id"> --}}
                @foreach ($preguntasFormulario as $pregunta)
                    @if ($item->id === $pregunta->id)
                        @livewire('formulario.editarpreguntas', ['pregunta' => $pregunta], key($pregunta->id))
                    @endif
                @endforeach
                {{-- </div> --}}
                @php
                    $idshow = $item->id;
                    $idedit = $item->id . 100;
                    $allPreguntasArray = [];
                    for ($i = 0; $i < count($getAllPreguntas); $i++) {
                        $allPreguntasArray[] = $getAllPreguntas[$i]['id'] . '|';
                    }
                    $allPreguntasString = implode($allPreguntasArray);
                @endphp
                <div onclick="MostrarOcultarDiv({{ $idshow }},{{ $idedit }}, '{{ $allPreguntasString }}')"
                    id="{{ $item->id }}" class="py-6 mb-5 px-7">
                    <div class="flex flex-wrap">
                        <div class="w-full mb-10 md:w-1/2 md:mb-0">
                            {{-- <h1 style="color: white">{{ $item->id }}</h1> --}}
                            <div class="mx-1 mb-6">
                                <x-jet-label>
                                    <strong>PREGUNTA</strong>
                                </x-jet-label>
                                @if ($item->pregunta != '')
                                    <x-jet-input class="border-green-500 focus:ring-green-600 focus:border-green-600"
                                        value="{{ $item->pregunta }}" disabled />
                                @else
                                    <x-jet-input class="border-red-500 focus:ring-red-600 focus:border-red-600"
                                        value="Ingrese la pregunta?" disabled />
                                @endif
                            </div>
                            @if ($item->tipodecomponente == 'input')
                                <div class="mx-10 mb-6">
                                    <x-jet-label>
                                        <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                                    </x-jet-label>
                                    <x-jet-input
                                        class="text-sm text-gray-900 border border-gray-300 border-green-600 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500"
                                        placeholder="respuesta de texto corto" disabled />

                                </div>
                            @elseif ($item->tipodecomponente == 'textarea')
                                <div class="mx-5">
                                    <x-jet-label>
                                        <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                                    </x-jet-label>
                                    <textarea id="" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 border-green-600"
                                        disabled></textarea>
                                </div>
                            @elseif ($item->tipodecomponente == 'radio')
                                <div class="mx-5">
                                    @php
                                        /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                                        $valorcomponenteArray = explode('|', $item->valordecomponente);
                                    @endphp
                                    <x-jet-label>
                                        <strong>TIPO DE RESPUESTA PARA LA PREGUNTA
                                            {{ $valorcomponenteArray[0] }}</strong>
                                    </x-jet-label>
                                    <div>
                                        @for ($radio = 0; $radio < $item->numerodecomponente; $radio++)
                                            <div
                                                class="flex items-center pl-4 mt-2 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" type="radio" value=""
                                                    name="bordered-radio"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                                                @if ($item->valordecomponente != '')
                                                    <label id="{{ $item->id }}" for="bordered-radio-1"
                                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">{{ $valorcomponenteArray[$radio] }}</label>
                                                @else
                                                    <label for="bordered-radio-1"
                                                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">valor
                                                        default</label>
                                                @endif

                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @elseif ($item->tipodecomponente == 'checkbox')
                                <div class="mx-5">
                                    @php
                                        /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                                        $valorcomponentecheckboxArray = explode('|', $item->valordecomponente);
                                    @endphp
                                    <x-jet-label>
                                        <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                                    </x-jet-label>
                                    @for ($i = 0; $i < $item->numerodecomponente; $i++)
                                        <div>
                                            <x-jet-checkbox class="border-blue-700" />
                                            <label for="checked-checkbox"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">{{ $valorcomponentecheckboxArray[$i] }}</label>
                                        </div>
                                    @endfor
                                </div>
                            @elseif ($item->tipodecomponente == 'select')
                                <div class="mx-5">
                                    @php
                                        /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                                        $valorcomponenteselectArray = explode('|', $item->valordecomponente);
                                    @endphp
                                    <select name="select"
                                        class="bg-green-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5">
                                        <option value="">
                                            Seleccione una opcion
                                        </option>
                                        @for ($select = 0; $select < $item->numerodecomponente; $select++)
                                            <option value="">
                                                {{ $valorcomponenteselectArray[$select] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            @endif
                            <div class="mt-5">
                                <label for="">Obligatorio</label>
                                <input type="checkbox" {{ $item->campoobligatorio == 1 ? "checked='checked'" : '' }}
                                    {{-- wire:click='getId({{ $item->id }})' wire:model="checkboxobligatorio" --}}>
                                <x-jet-button
                                    class="px-4 py-2 ml-3 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                                    wire:click="borrarPregunta({{ $item->id }})">
                                    <svg class="w-6 h-6 text-white-500" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                                        <rect x="9" y="3" width="6" height="4"
                                            rx="2" />
                                        <path d="M10 12l4 4m0 -4l-4 4" />
                                    </svg>
                                    Eliminar
                                </x-jet-button>
                            </div>
                        </div>
                        <div class="w-full mb-10 ml-5 md:w-1/4 md:mb-0">
                            <div class="mx-3">
                                <select name="select"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $item->tipodecomponente }}"
                                        {{ $item->tipodecomponente === 'input' ? 'selected="selected"' : '' }}>
                                        texto corto
                                    </option>
                                    <option value="{{ $item->tipodecomponente }}"
                                        {{ $item->tipodecomponente === 'textarea' ? 'selected="selected"' : '' }}>
                                        Parrafo
                                    </option>
                                    <option value="{{ $item->tipodecomponente }}"
                                        {{ $item->tipodecomponente === 'radio' ? 'selected="selected"' : '' }}>
                                        Opcion
                                        multiple
                                    </option>
                                    <option value="{{ $item->tipodecomponente }}"
                                        {{ $item->tipodecomponente === 'checkbox' ? 'selected="selected"' : '' }}>
                                        Casilla
                                        de
                                        Verificacion</option>
                                    <option value="{{ $item->tipodecomponente }}"
                                        {{ $item->tipodecomponente === 'select' ? 'selected="selected"' : '' }}>
                                        Lista
                                        desplegable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div onclick="MostrarOcultarDiv({{ $idshow }},{{ $idedit }}, '{{ $allPreguntasString }}')"
                    style="margin-bottom: 10px" class="px-4 py-1 mx-auto mt-5 mb-10 bg-indigo-300 rounded">
                    <x-jet-button wire:click="borrarPregunta({{ $item->id }})">
                        <svg class="w-6 h-6 text-red-500" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                            <rect x="9" y="3" width="6" height="4" rx="2" />
                            <path d="M10 12l4 4m0 -4l-4 4" />
                        </svg>
                        Eliminar
                    </x-jet-button>
                </div>
            </div>
        @endforeach
    </div>


</div>
