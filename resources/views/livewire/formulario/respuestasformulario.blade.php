<div class="px-5 py-5 mb-5 ml-3 mr-3 bg-indigo-100 rounded">    
    <div class="container">
        <div class="flex flex-col justify-between md:flex-col">
            <div class="">
                <a
                    class="block text-lg font-semibold transition-colors font-body text-primary hover:text-green dark:text-black dark:hover:text-secondary">{{ $preguntas->pregunta }}
                    <small class="text-lg text-red-600">{{ $preguntas->campoobligatorio == 1 ? '*' : '' }}</small></a>
            </div>
            {{-- VALIDAMOS SI VIENE DATOS CON PROMEDIO PARA MOSTRAR LA BARRA DE PORCENTAJE --}}
            @if (count($obtenerPromedio))
                <div class="flex w-full h-4 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-400">
                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                        style="width: {{ $obtenerPromedio[0]['puntuacionporregistro'] }}%">
                        {{ $obtenerPromedio[0]['puntuacionporregistro'] }}%
                        de 100%</div>

                    @if ($obtenerPromedio[0]['puntuacionporregistro'] != '' || $obtenerPromedio[0]['puntuacionporregistro'] != null)
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="flex items-center pt-4">
        @php
            /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
            $valorcomponenteArray = explode('|', $preguntas->valordecomponente);
            $idpregunta = $preguntas->id;
        @endphp
        @if ($preguntas->tipodecomponente === 'input')
            <div class="relative h-10 w-full min-w-[200px]">
                <input type="{{ $preguntas->tipodedatos }}"
                    {{ $preguntas->mindecaracteres > 0 ? 'minlength=' . $preguntas->mindecaracteres . ' ' : '' }}
                    {{ $preguntas->maxdecaracteres > 0 ? 'maxlength=' . $preguntas->maxdecaracteres . ' ' : '' }}
                    class="bg-green-50 border border-green-500 text-black font-semibold placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-white dark:border-green-500"
                    placeholder="Ingrese su respuesta" {{ $preguntas->campoobligatorio == 1 ? 'required' : '' }}
                    wire:model='valoresRespuesta'>
            </div>
        @elseif($preguntas->tipodecomponente === 'textarea')
            <div class="relative w-full min-w-[200px]">
                <textarea
                    class="peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-green-500 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-green-500 placeholder-shown:border-t-green-500 focus:border-2 focus:border-green-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" " {{ $preguntas->campoobligatorio == 1 ? 'required' : '' }} wire:model='valoresRespuesta'></textarea>
                <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-green-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-green-500 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-green-500 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-green-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-green-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-green-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-green-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    ingrese su respuesta
                </label>
            </div>
        @elseif($preguntas->tipodecomponente === 'radio')
            <div>
                @for ($radio = 0; $radio < $preguntas->numerodecomponente; $radio++)
                    <div
                        class="flex items-center px-3 {{-- pl-4 --}} mt-2 border border-green-500 rounded dark:border-green-500">
                        <label class="relative flex items-center p-3 rounded-full cursor-pointer" for="pink"
                            wire:click="guardarValorComponenteRadio('{{ $valorcomponenteArray[$radio] }}')">
                            <input id="pink" name="radio-{{ $idpregunta }}" type="radio"
                                class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-green-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:before:bg-pink-500 hover:before:opacity-10"
                                {{ $preguntas->campoobligatorio == 1 ? 'required' : '' }} />
                            <div
                                class="absolute text-green-500 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16"
                                    fill="currentColor">
                                    <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                </svg>
                            </div>
                        </label>
                        <label class="mt-px font-light text-gray-700 cursor-pointer select-none" for="html">
                            <small>{{ $valorcomponenteArray[$radio] }}</small>
                        </label>
                    </div>
                @endfor
            </div>
        @elseif($preguntas->tipodecomponente === 'checkbox')
            <div>
                @for ($checkbox = 0; $checkbox < $preguntas->numerodecomponente; $checkbox++)
                    <div
                        class="flex items-center px-3 {{-- pl-4 --}} mt-2 border border-green-500 rounded dark:border-green-500">
                        <label class="relative flex items-center p-3 rounded-full cursor-pointer" for="ripple-on"
                            data-ripple-dark="true">
                            <input wire:model="valoresCheckbox.{{ $checkbox }}" id="ripple-on" type="checkbox"
                                value="{{ $valorcomponenteArray[$checkbox] }}"
                                class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:bg-green-500 checked:before:bg-green-500 hover:before:opacity-10" />
                            <div
                                class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                    fill="currentColor" stroke="currentColor" stroke-width="1">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </label>
                        <label class="mt-px font-light text-gray-700 cursor-pointer select-none" for="ripple-on">
                            {{ $valorcomponenteArray[$checkbox] }}
                        </label>
                    </div>
                @endfor
            </div>
        @elseif($preguntas->tipodecomponente === 'select')
            <div class="relative h-10 w-72 min-w-[200px]">
                <select
                    class="block w-full px-4 py-3 text-sm border-green-500 rounded-md pr-9 focus:border-green-600 focus:ring-green-600"
                    wire:model='valoresRespuesta' {{ $preguntas->campoobligatorio == 1 ? 'required' : '' }}>
                    <option value="">Selccione una opcion</option>
                    @for ($select = 0; $select < $preguntas->numerodecomponente; $select++)
                        <option value="{{ $valorcomponenteArray[$select] }}">{{ $valorcomponenteArray[$select] }}
                        </option>
                    @endfor
                </select>
            </div>
        @endif
    </div>
</div>