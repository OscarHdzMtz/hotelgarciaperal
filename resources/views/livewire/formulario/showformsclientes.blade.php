<div>
    <div id="main">
        <div class="container mx-auto">
            <div class="bg-indigo-500 rounded {{-- px-7 --}}">
                <img class="mx-auto" src="{{ asset('storage/' . $getDatosFormulario[0]['img']) }}" alt="">
            </div>
            <div class="mt-3 mb-3 text-center bg-indigo-600 rounded py-7">
                <h3 class="pt-5 text-2xl font-semibold font-body text-primary dark:text-white md:text-3xl lg:text-5xl">
                    {{ $getDatosFormulario[0]['nombre'] }}
                </h3>
                {{-- <div class="pt-3 text-center sm:w-3/4"> --}}
                <p class="font-light text-1xl font-body text-primary dark:text-white">
                    {{ $getDatosFormulario[0]['descripcion'] }}
                </p>
                {{-- </div> --}}
            </div>
        </div>
        <form wire:submit.prevent="finalizarRegistroFormulario">
            <div class="container mx-auto">
                <div class="{{-- py-8 --}} bg-indigo-500 rounded lg:px-8 {{-- lg:py-1 --}}">
                    <div class="pt-8 lg:pt-12">
                        @foreach ($preguntasFormulario as $preguntas)
                            @livewire('formulario.respuestasformulario', ['preguntas' => $preguntas, 'wireidporregistro' => $wireidporregistro], key($preguntas->id))
                        @endforeach
                    </div>
                </div>
                <div>
                    <div class="text-center bg-indigo-500 rounded py-7">
                        <div class="px-5 py-5 ml-3 mr-3 bg-indigo-100 rounded">
                            <div class="flex content-center pt-4">
                                <h3 class="mr-3">Gracias!!</h3>
                                <button
                                    class="flex select-none items-center gap-3 rounded-lg border border-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:opacity-75 focus:ring focus:ring-pink-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="submit" data-ripple-dark="true">
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
                </div>
            </div>
        </form>
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
