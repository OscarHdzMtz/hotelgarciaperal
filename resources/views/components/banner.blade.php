<div class="container px-4 mx-auto">
    <div class="py-6 bg-indigo-500 rounded px-7">
        <div class="flex flex-wrap">
            <div class="w-full pt-6 mb-10 md:w-1/4 md:mb-0">
                <h3 class="mb-1 text-2xl font-bold text-white">
                    <span class="text-green-300">Nombre</span>
                    <x-jet-input
                        class="text-sm text-gray-900 border border-blue-400 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500{{--  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 --}}"
                        wire:model="nombreInput" value="{{ $nameImg[0]['nombre'] }}" />
                </h3>
                {{-- <p class="mb-8 text-sm font-medium text-indigo-100 md:mb-16">{{ $nameImg[0]['descripcion'] }}</p>
                --}}
                {{--
                <x-jet-input wire:model="descript" value="{{ $nameImg[0]['descripcion'] }}" /> --}}
                <h3 class="mb-1 text-2xl font-bold text-white">
                    <label class="text-green-300">Descripcion</label>
                </h3>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-blue-400 focus:ring-blue-500 focus:border-blue-500 {{-- dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 --}}"
                    wire:model="descripcionInput" value="{{ $nameImg[0]['descripcion'] }}"></textarea>

                <a class="flex items-center mt-5 font-medium text-white" href="#">
                    <svg class="mr-1" width="12" height="14" viewbox="0 0 12 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.92 6.62C11.8724 6.49725 11.801 6.38511 11.71 6.29L6.71 1.29C6.61676 1.19676 6.50607 1.1228 6.38425 1.07234C6.26243 1.02188 6.13186 0.995911 6 0.995911C5.7337 0.995911 5.4783 1.1017 5.29 1.29C5.19676 1.38324 5.1228 1.49393 5.07234 1.61575C5.02188 1.73758 4.99591 1.86814 4.99591 2C4.99591 2.2663 5.1017 2.5217 5.29 2.71L8.59 6H1C0.734784 6 0.48043 6.10536 0.292893 6.2929C0.105357 6.48043 0 6.73479 0 7C0 7.26522 0.105357 7.51957 0.292893 7.70711C0.48043 7.89465 0.734784 8 1 8H8.59L5.29 11.29C5.19627 11.383 5.12188 11.4936 5.07111 11.6154C5.02034 11.7373 4.9942 11.868 4.9942 12C4.9942 12.132 5.02034 12.2627 5.07111 12.3846C5.12188 12.5064 5.19627 12.617 5.29 12.71C5.38296 12.8037 5.49356 12.8781 5.61542 12.9289C5.73728 12.9797 5.86799 13.0058 6 13.0058C6.13201 13.0058 6.26272 12.9797 6.38458 12.9289C6.50644 12.8781 6.61704 12.8037 6.71 12.71L11.71 7.71C11.801 7.6149 11.8724 7.50275 11.92 7.38C12.02 7.13654 12.02 6.86346 11.92 6.62Z"
                            fill="#D7D5F8"></path>
                    </svg>
                    <span>Vista previa</span>
                </a>
            </div>
            <div class="items-center w-full md:w-3/4">
                <img class="{{-- h-48  --}}mx-auto" src="{{ asset('storage/' . $nameImg[0]['img']) }}" alt="">
                <div class="">
                    <label for="exampleInputName" class="text-gray-900">actualizar imagen</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="imgformulario">
                    @error('img') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>
</div>