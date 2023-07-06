<x-forms-layout>
    <div class="w-full {{-- px-9  --}}{{-- py-8 --}} mx-auto {{-- sm:px-6 --}} lg:px-72 max-w-9xl">

        <div class="w-full px-3 pt-3 mx-auto bg-gray-300 lg:px-10 {{-- max-w-9xl --}}">

            @livewire('formulario.showformsclientes', ['idformulario' => $id])

        </div>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 mx-auto">
                {{-- <div class="flex flex-col items-center mr-auto sm:flex-row"> --}}
                <img class="mx-auto" src="{{ asset('img/Gperal.png') }}" alt="logo" width="150px" height="150px" />
                <p class="pt-5 font-light font-body text-primary dark:text-white sm:pt-0">
                    ©HotelGarciaPeral
                </p>
                {{-- </div> --}}
            </div>
        </div>
    </div>

</x-forms-layout>
