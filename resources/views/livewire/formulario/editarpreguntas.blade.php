<div id="{{ $idpregunta . 100 }}" style="display: none; margin-left: -10px" class="border-l-4 border-indigo-500">
    <div class="container px-4 mx-auto mt-5 {{-- bg-red-400  --}}rounded">
        <div class="py-6 mb-5 px-7">
            <div class="flex flex-wrap">
                <div class="w-full mb-10 md:w-1/2 md:mb-0">
                    <div class="mx-1 mb-6">
                        <x-jet-label>
                            <strong>PREGUNTA {{ $getpregunta[0]['id'] }}</strong>
                        </x-jet-label>
                        @if ($getpregunta[0]['pregunta'] != '')
                            <x-jet-input class="border-green-500 focus:ring-green-600 focus:border-green-600"
                                value="" />
                        @else
                            <x-jet-input class="border-red-500 focus:ring-red-600 focus:border-red-600"
                                value="Ingrese la pregunta?" wire:model="valuepregunta" />
                        @endif
                    </div>
                    @if ($getpregunta[0]['tipodecomponente'] == 'input')
                        <div class="mx-10 mb-6">
                            <x-jet-label>
                                <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                            </x-jet-label>
                            <x-jet-input
                                class="text-sm text-gray-900 border border-green-600 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500"
                                placeholder="respuesta de texto corto" />
                        </div>
                    @elseif ($getpregunta[0]['tipodecomponente'] == 'textarea')
                        <div class="mx-5">
                            <x-jet-label>
                                <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                            </x-jet-label>
                            <textarea id="" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border focus:ring-green-500 focus:border-green-500 border-green-600"></textarea>
                        </div>
                    @elseif ($getpregunta[0]['tipodecomponente'] == 'radio')
                        <div class="mx-5">
                            @php
                                /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                                $valorcomponenteArray = explode('|', $getpregunta[0]['valordecomponente']);
                            @endphp
                            <x-jet-label>
                                <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                            </x-jet-label>
                            <div>
                                @for ($radio = 0; $radio < $getpregunta[0]['numerodecomponente']; $radio++)
                                    <div
                                        class="flex items-center pl-4 mt-2 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="bordered-radio-1" type="radio" value="" name="bordered-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                                        @if ($getpregunta[0]['valordecomponente'] != '')
                                            <label for="bordered-radio-1"
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
                        @elseif ($getpregunta[0]['tipodecomponente'] == 'checkbox')
                            <div class="mx-5">
                                @php
                                    /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                                    $valorcomponentecheckboxArray = explode('|', $getpregunta[0]['valordecomponente']);
                                @endphp
                                <x-jet-label>
                                    <strong>TIPO DE RESPUESTA PARA LA PREGUNTA</strong>
                                </x-jet-label>
                                @for ($i = 0; $i < $getpregunta[0]['numerodecomponente']; $i++)
                                    <div>
                                        <x-jet-checkbox class="border-blue-700" />
                                        <label for="checked-checkbox"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">{{ $valorcomponentecheckboxArray[$i] }}</label>
                                    </div>
                                @endfor
                            </div>
                        @elseif ($getpregunta[0]['tipodecomponente'] == 'select')
                            <div class="mx-5">
                                @php
                                    /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                                    $valorcomponenteselectArray = explode('|', $getpregunta[0]['valordecomponente']);
                                @endphp
                                <select name="select"
                                    class="bg-green-50 border border-green-500 text-gray-900 text-sm rounded-lg focus:ring-green-700 focus:border-green-700 block w-full p-2.5">
                                    <option value="">
                                        Seleccione una opcion
                                    </option>
                                    @for ($select = 0; $select < $getpregunta[0]['numerodecomponente']; $select++)
                                        <option value="">
                                            {{ $valorcomponenteselectArray[$select] }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                    @endif
                    <div class="mt-5">
                        <label for="">Obligatorio</label>
                        <input type="checkbox" {{ $getpregunta[0]['campoobligatorio'] == 1 ? "checked='checked'" : '' }}
                            {{-- wire:click='getId({{ $item->id }})' wire:model="checkboxobligatorio" --}}>
                        {{-- <x-jet-button
                            class="px-4 py-2 ml-3 font-bold text-white bg-red-500 rounded-full hover:bg-red-700"
                            wire:click="borrarPregunta({{ $getpregunta[0]['id'] }})">
                            <svg class="w-6 h-6 text-white-500" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                                <rect x="9" y="3" width="6" height="4" rx="2" />
                                <path d="M10 12l4 4m0 -4l-4 4" />
                            </svg>
                            Eliminar
                        </x-jet-button> --}}
                    </div>
                </div>
                <div class="w-full mb-10 ml-5 md:w-1/4 md:mb-0">
                    <div class="mx-3">
                        <select name="select"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $getpregunta[0]['tipodecomponente'] }}"
                                {{ $getpregunta[0]['tipodecomponente'] === 'input' ? 'selected="selected"' : '' }}>
                                texto corto
                            </option>
                            <option value="{{ $getpregunta[0]['tipodecomponente'] }}"
                                {{ $getpregunta[0]['tipodecomponente'] === 'textarea' ? 'selected="selected"' : '' }}>
                                Parrafo
                            </option>
                            <option value="{{ $getpregunta[0]['tipodecomponente'] }}"
                                {{ $getpregunta[0]['tipodecomponente'] === 'radio' ? 'selected="selected"' : '' }}>
                                Opcion
                                multiple
                            </option>
                            <option value="{{ $getpregunta[0]['tipodecomponente'] }}"
                                {{ $getpregunta[0]['tipodecomponente'] === 'checkbox' ? 'selected="selected"' : '' }}>
                                Casilla
                                de
                                Verificacion</option>
                            <option value="{{ $getpregunta[0]['tipodecomponente'] }}"
                                {{ $getpregunta[0]['tipodecomponente'] === 'select' ? 'selected="selected"' : '' }}>
                                Lista
                                desplegable</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
