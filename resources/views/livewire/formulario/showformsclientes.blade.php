<div>
    @if ($mostrarModalFinalFormulario === true)
        @include('pages.formularios.modalPorcentajeTotal')
    @endif
    <div id="main">
        <div class="container mx-auto">
            <div class="{{-- bg-red-300 --}} bg-indigo-100 rounded">
                <img class="mx-auto rounded" src="{{ asset('storage/' . $getDatosFormulario[0]['img']) }}" alt="">
            </div>
            <div class="py-3 mt-3 mb-4 text-center {{-- bg-red-200 --}} bg-indigo-100 rounded shadow-lg md:py-5 {{-- shadow-red-500/50 --}}">
                <h3 class="pt-5 text-2xl font-semibold font-body text-primary dark:text-black md:text-3xl lg:text-5xl">
                    {{ $getDatosFormulario[0]['nombre'] }}
                </h3>
                {{-- <div class="pt-3 text-center sm:w-3/4"> --}}
                <p class="mt-3 text-lg font-semibold transition-colors font-body text-primary dark:text-black">
                    {{ $getDatosFormulario[0]['descripcion'] }}
                </p>
                {{-- </div> --}}
            </div>
        </div>
        <form wire:submit.prevent="finalizarRegistroFormulario">
            <div class="container mx-auto">
                <div class="py-1 rounded {{-- bg-zinc-400/50 --}} bg-indigo-100 lg:px-8 lg:py-5">
                    <div class="text-center text-red-700">
                        <strong>*</strong><small class="text-black"> Indica que la pregunta es obligatoria</small>
                    </div>
                    <div class="pt-8 lg:pt-12">
                        @foreach ($preguntasFormulario as $preguntas)
                            @livewire('formulario.respuestasformulario', ['preguntas' => $preguntas, 'wireidporregistro' => $wireidporregistro], key($preguntas->id))
                        @endforeach
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-2 py-5 my-2 lg:py-8 sm:grid-cols-7">
                    <div class="col-span-1 sm:col-span-3">
                        {{-- <h1
                            class="px-6 py-3 font-sans text-xs font-bold text-center text-black uppercase align-middle text-md text-black-500 ">
                            Texto de prueba garcia peral!</h1> --}}
                    </div>
                    <div class="col-span-1 mx-auto sm:col-span-2">
                        <button
                            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-green-700 dark:focus:ring-green-700 mr-2 mb-2"
                            type="submit">
                            <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="bitcoin" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M504 256c0 136.1-111 248-248 248S8 392.1 8 256 119 8 256 8s248 111 248 248zm-141.7-35.33c4.937-32.1-20.19-50.74-54.55-62.57l11.15-44.7-27.21-6.781-10.85 43.52c-7.154-1.783-14.5-3.464-21.8-5.13l10.93-43.81-27.2-6.781-11.15 44.69c-5.922-1.349-11.73-2.682-17.38-4.084l.031-.14-37.53-9.37-7.239 29.06s20.19 4.627 19.76 4.913c11.02 2.751 13.01 10.04 12.68 15.82l-12.7 50.92c.76 .194 1.744 .473 2.829 .907-.907-.225-1.876-.473-2.876-.713l-17.8 71.34c-1.349 3.348-4.767 8.37-12.47 6.464 .271 .395-19.78-4.937-19.78-4.937l-13.51 31.15 35.41 8.827c6.588 1.651 13.05 3.379 19.4 5.006l-11.26 45.21 27.18 6.781 11.15-44.73a1038 1038 0 0 0 21.69 5.627l-11.11 44.52 27.21 6.781 11.26-45.13c46.4 8.781 81.3 5.239 95.99-36.73 11.84-33.79-.589-53.28-25-65.99 17.78-4.098 31.17-15.79 34.75-39.95zm-62.18 87.18c-8.41 33.79-65.31 15.52-83.75 10.94l14.94-59.9c18.45 4.603 77.6 13.72 68.81 48.96zm8.417-87.67c-7.673 30.74-55.03 15.12-70.39 11.29l13.55-54.33c15.36 3.828 64.84 10.97 56.85 43.03z">
                                </path>
                            </svg>
                            Enviar Formulario
                        </button>
                    </div>
                    <div class="col-span-1 mx-auto sm:col-span-2">
                        <button type="button" onclick="window.location.reload()"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-red-800 dark:focus:ring-red-700 mr-2 mb-2">
                            <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="bitcoin" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M504 256c0 136.1-111 248-248 248S8 392.1 8 256 119 8 256 8s248 111 248 248zm-141.7-35.33c4.937-32.1-20.19-50.74-54.55-62.57l11.15-44.7-27.21-6.781-10.85 43.52c-7.154-1.783-14.5-3.464-21.8-5.13l10.93-43.81-27.2-6.781-11.15 44.69c-5.922-1.349-11.73-2.682-17.38-4.084l.031-.14-37.53-9.37-7.239 29.06s20.19 4.627 19.76 4.913c11.02 2.751 13.01 10.04 12.68 15.82l-12.7 50.92c.76 .194 1.744 .473 2.829 .907-.907-.225-1.876-.473-2.876-.713l-17.8 71.34c-1.349 3.348-4.767 8.37-12.47 6.464 .271 .395-19.78-4.937-19.78-4.937l-13.51 31.15 35.41 8.827c6.588 1.651 13.05 3.379 19.4 5.006l-11.26 45.21 27.18 6.781 11.15-44.73a1038 1038 0 0 0 21.69 5.627l-11.11 44.52 27.21 6.781 11.26-45.13c46.4 8.781 81.3 5.239 95.99-36.73 11.84-33.79-.589-53.28-25-65.99 17.78-4.098 31.17-15.79 34.75-39.95zm-62.18 87.18c-8.41 33.79-65.31 15.52-83.75 10.94l14.94-59.9c18.45 4.603 77.6 13.72 68.81 48.96zm8.417-87.67c-7.673 30.74-55.03 15.12-70.39 11.29l13.55-54.33c15.36 3.828 64.84 10.97 56.85 43.03z">
                                </path>
                            </svg>
                            Borrar Formulario
                        </button>
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="container mx-auto">
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
        </div> --}}
    </div>
</div>
