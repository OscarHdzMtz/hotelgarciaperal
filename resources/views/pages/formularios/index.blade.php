<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <!-- BANNER DE TITULO -->
        <x-formularios.formularios-banner />

        {{-- MODAL DE REGISTRO CON LIVEWIRE--}}
        @livewire('formulario.createformulario')
        
        {{-- MUESTRA LOS PROYECTOS EN CARDS CON LIVEWIRE --}}
        @livewire('formulario.showformulario')            
    </div>
</x-app-layout>
