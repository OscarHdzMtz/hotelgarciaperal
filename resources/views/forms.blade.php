<x-forms-layout>
    <div class="w-full {{-- px-9  --}}{{-- py-8 --}} mx-auto {{-- sm:px-6 --}} lg:px-72 max-w-9xl">

        <div class="w-full px-3 pt-3 mx-auto bg-gray-300 lg:px-10 {{-- max-w-9xl --}}">

            @livewire('formulario.showformsclientes', ['idformulario' => $id])

        </div>        
        <div class="container mx-auto mb-2">
            <div class="grid grid-cols-1 mx-auto">                
                <img class="mx-auto" src="{{ asset('img/Gperal.png') }}" alt="logo" width="150px" height="150px" />
                {{-- <p class="pt-5 text-center transition-colors text-md font-body text-primary dark:text-black sm:pt-0">
                    <strong>©HotelGarciaPeral {{ date('Y') }} </strong>| Todos los derechos reservados
                </p>  --}}                             
                <div class="grid grid-cols-1 -mt-5 md:mt-0 md:grid-cols-2">
                    <p class="pt-5 font-semibold text-center transition-colors md:text-right text-md font-body text-primary dark:text-black sm:pt-0">
                        ©HotelGarciaPeral {{ date('Y') }} |
                    </p>                    
                    <p class="text-center transition-colors md:text-left text-md font-body text-primary dark:text-black sm:pt-0">
                        &#160Todos los derechos reservados
                    </p>
                </div>  
            </div>
        </div>
    </div>

</x-forms-layout>
