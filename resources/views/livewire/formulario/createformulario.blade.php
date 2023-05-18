<div class="mt-6" x-data="{ open: false }">

    <!-- Button (blue), duh! -->
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-5" type="button" " @click="open = true">
        Agregar nuevo
      </button>    

    <!-- Dialog (full screen) -->
    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >

      <!-- A basic modal dialog with title, body and one button to close -->
      <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          {{-- <h3 class="text-lg font-medium leading-6 text-gray-900">
            Modal Title
          </h3> --}}

          <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-center text-black">AGREGAR PROYECTO</h3>
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre *</label>
                    <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{-- dark:bg-gray-600 --}} dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" placeholder="" wire:model="nombre" required>
                    @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripcion</label>
                    <textarea name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{-- dark:bg-gray-600 --}} dark:border-gray-500 dark:placeholder-gray-400 dark:text-black" id="" cols="30" rows="5" wire:model="descripcion"></textarea>
                    @error('descripcion') <span class="text-danger">{{ $message }}</span>@enderror
                </div>     
                <div class="mb-5 form-group">
                    <label for="exampleInputName">Image</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="img">
                    @error('img') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>                
            </form>
        </div>
      </div>
        <!-- One big close button.  --->
        <div class="mt-5 sm:mt-6">
          <span class="flex w-full rounded-md shadow-sm">
            <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
              Cerrar
            </button>
          </span>
        </div>

      </div>
    </div>
  </div>

  
