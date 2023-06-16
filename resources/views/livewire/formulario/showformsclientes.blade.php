<div>
    <div id="main">
        <div class="container mx-auto">
            <div class="bg-indigo-500 rounded {{-- px-7 --}}">
                <img class="mx-auto" src="{{ asset('storage/' . $getDatosFormulario[0]['img']) }}" alt="">
            </div>
            <div class="mt-3 mb-3 text-center bg-indigo-600 rounded py-7">
                <h1 class="pt-5 text-4xl font-semibold font-body text-primary dark:text-white md:text-5xl lg:text-6xl">
                    {{ $getDatosFormulario[0]['nombre'] }}
                </h1>
                {{-- <div class="pt-3 text-center sm:w-3/4"> --}}
                <p class="text-xl font-light font-body text-primary dark:text-white">
                    {{ $getDatosFormulario[0]['descripcion'] }}
                </p>
                {{-- </div> --}}
            </div>
        </div>
        <div class="container mx-auto">
            <div class="{{-- py-8 --}} bg-indigo-500 rounded lg:px-8{{--  lg:py-8 --}}">
                <div class="pt-8 lg:pt-12">
                    @foreach ($preguntasFormulario as $preguntas)
                        {{-- <div class="px-5 py-5 mt-5 ml-3 mr-3 bg-indigo-100 rounded">                            
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
                                        $valorcomponenteArray = explode('|', $preguntas->valordecomponente);
                                    @endphp
                                    <div>
                                        @for ($radio = 0; $radio < $preguntas->numerodecomponente; $radio++)
                                            <div
                                                class="flex items-center px-3 mt-2 border border-green-500 rounded dark:border-green-500">
                                                <label
                                                    class="relative flex items-center p-3 rounded-full cursor-pointer"
                                                    for="pink">
                                                    <input id="pink" name="color" type="radio"
                                                        class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-pink-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:before:bg-pink-500 hover:before:opacity-10" />
                                                    <div
                                                        class="absolute text-pink-500 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
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
                        </div> --}}
                        @livewire('formulario.respuestasformulario', ['preguntas' => $preguntas, 'wireidporregistro' => $wireidporregistro], key($preguntas->id))
                    @endforeach
                </div>
                <div class="py-3">
                    <div class="px-5 py-3 ml-3 mr-3 bg-indigo-100 rounded">
                        <div class="flex {{-- items-center --}} content-between pt-4">
                            <h3 class="mr-3">Gracias por su tiempo </h3>
                            <button
                                class="flex select-none items-center gap-3 rounded-lg border border-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:opacity-75 focus:ring focus:ring-pink-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" data-ripple-dark="true">
                                Finalizar
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <form class="flex flex-col px-3 py-12 rounded sm:flex-row">
                    <input type="email" id="subscribe" placeholder="suscribirse a promociones…"
                        class="w-full px-5 py-4 font-light transition-colors border border-green-500 rounded-md border-primary bg-grey-lightest font-body text-primary placeholder-primary focus:border-secondary focus:outline-none focus:ring-2 focus:ring-secondary dark:border-secondary sm:w-1/2" />
                    <button type="submit"
                        class="px-10 py-4 mt-5 text-xl font-semibold text-white border-green-500 bg-secondary font-body hover:bg-green sm:mt-0 md:text-2xl">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        <div class="container mx-auto">
            <div
                class="flex flex-col items-center justify-between py-10 border-t border-grey-lighter sm:flex-row sm:py-12">
                <div class="flex flex-col items-center mr-auto sm:flex-row">
                    <img class="mx-auto" src="{{ asset('img/Gperal.png') }}" alt="logo" width="100px"
                        height="100px" />
                    <p class="pt-5 font-light font-body text-primary dark:text-white sm:pt-0">
                        ©HotelGarciaPeral
                    </p>
                </div>
                <div class="flex items-center pt-5 mr-auto sm:mr-0 sm:pt-0">

                    <a href="https://github.com/ " target="_blank">
                        <i
                            class="pl-5 text-4xl transition-colors text-primary dark:text-white hover:text-secondary dark:hover:text-secondary bx bxl-github"></i>
                    </a>

                    <a href="https://codepen.io/ " target="_blank">
                        <i
                            class="pl-5 text-4xl transition-colors text-primary dark:text-white hover:text-secondary dark:hover:text-secondary bx bxl-codepen"></i>
                    </a>

                    <a href="https://www.linkedin.com/ " target="_blank">
                        <i
                            class="pl-5 text-4xl transition-colors text-primary dark:text-white hover:text-secondary dark:hover:text-secondary bx bxl-linkedin"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
