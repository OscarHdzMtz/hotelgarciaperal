<div x-data="{ mostrarModal: true }">
    <div x-show="mostrarModal"
        class="fixed inset-0 top-0 left-0 z-50 flex items-center justify-center h-screen px-3 bg-center bg-no-repeat bg-cover outline-none min-w-screen animated fadeIn faster focus:outline-none"
        {{-- style="background-image: url(https://images.unsplash.com/photo-1623600989906-6aae5aa131d4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1582&q=80);" --}}
        id="modal-id">
        <div class="absolute inset-0 z-0 bg-black opacity-80"></div>
        <div class="relative w-full max-w-lg p-5 mx-auto my-auto bg-white shadow-lg rounded-xl ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="justify-center flex-auto p-5 text-center">                    
                    <img class="mx-auto" src="{{ asset('img/Gperal.png') }}" alt="logo" width="250px" height="250px" />
                    <h2 class="py-4 text-xl font-bold text-black ">¡GRACIAS POR SU VISITA!</h3>                        
                </div>
                <!--footer-->
                <div class="p-3 mt-2 space-x-4 text-center md:block">
                    <button @click="mostrarModal = false" onclick="window.location.reload()"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">
                        Cerrar
                    </button>
                    {{-- <button
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Nuevo boton</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
