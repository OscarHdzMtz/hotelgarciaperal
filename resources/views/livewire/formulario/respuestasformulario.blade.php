<div class="px-5 py-5 mt-5 ml-3 mr-3 bg-indigo-100 rounded">                            
    <a
        class="block text-lg font-semibold transition-colors font-body text-primary hover:text-green dark:text-black dark:hover:text-secondary">{{ $preguntas->pregunta }}</a>
    <div class="flex items-center pt-4">
        @if ($preguntas->tipodecomponente === 'input')
            <div class="relative h-10 w-full min-w-[200px]">
                <input
                    class="peer h-full w-full rounded-[7px] border border-green-500 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-green-500 placeholder-shown:border-t-green-500 focus:border-2 focus:border-green-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" " wire:model='respuestaInput' />
                <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-green-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-green-500 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-green-500 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-green-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-green-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-green-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-green-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    ingrese su respuesta
                </label>
            </div>
        @elseif($preguntas->tipodecomponente === 'textarea')
            <div class="relative w-full min-w-[200px]">
                <textarea
                    class="peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-green-500 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-green-500 placeholder-shown:border-t-green-500 focus:border-2 focus:border-green-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" "></textarea>
                <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-green-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-green-500 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-green-500 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-green-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-green-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-green-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-green-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    ingrese su respuesta
                </label>
            </div>
        @elseif($preguntas->tipodecomponente === 'radio')
            @php
                /* CONVERTIRMOS LA OPCIONES DE SRTING A ARRAY */
                $valorcomponenteArray = explode('|', $preguntas->valordecomponente);
                $idpregunta = $preguntas->id;
            @endphp
            <div>
                @for ($radio = 0; $radio < $preguntas->numerodecomponente; $radio++)
                    <div
                        class="flex items-center px-3 {{-- pl-4 --}} mt-2 border border-green-500 rounded dark:border-green-500" >
                        <label
                            class="relative flex items-center p-3 rounded-full cursor-pointer"
                            for="pink" wire:click="guardarValorComponenteRadio('{{ $valorcomponenteArray[$radio] }}')">
                            <input id="pink" name="radio-{{ $idpregunta }}" type="radio"
                                class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-green-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:before:bg-pink-500 hover:before:opacity-10"/>
                            <div
                                class="absolute text-green-500 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                    viewBox="0 0 16 16" fill="currentColor">
                                    <circle data-name="ellipse" cx="8" cy="8"
                                        r="8"></circle>
                                </svg>
                            </div>
                        </label>
                        <label class="mt-px font-light text-gray-700 cursor-pointer select-none"
                            for="html">
                            <small>{{ $valorcomponenteArray[$radio] }}</small>
                        </label>
                    </div>
                @endfor
            </div>
        @endif                                
    </div>
</div>