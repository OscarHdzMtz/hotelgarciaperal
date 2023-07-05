<x-forms-layout>
    <div class="w-full {{-- px-9  --}}{{-- py-8 --}} mx-auto {{-- sm:px-6 --}} lg:px-72 max-w-9xl">

        <div class="w-full px-3 pt-3 mx-auto bg-gray-300 lg:px-10 {{-- max-w-9xl --}}">

            @livewire('formulario.showformsclientes', ['idformulario' => $id])

        </div>

    </div>

</x-forms-layout>
