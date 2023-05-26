<div>
    {{-- PASASMOS LA VARIABLE $nombreImg que estamos recibiendo desde el controlador y lo recibimos en app/view/banner.php para poder recibirlo en el componente banner resource/views/component/banner.blade.php --}}
    <x-banner :nameImg="$getDateFormulario" />
    
    <x-jet-button class="bg-indigo-700" wire:click="agregarPregunta">
        <svg class="w-5 h-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <circle cx="12" cy="12" r="9" />
            <line x1="9" y1="12" x2="15" y2="12" />
            <line x1="12" y1="9" x2="12" y2="15" />
        </svg>
        Agregar pregunta
    </x-jet-button>

    <x-divpreguntas :allPreguntas="$getAllPreguntas">

    </x-divpreguntas>    
    
</div>
