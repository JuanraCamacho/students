<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sugerencias') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="container p-12">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('studentss') }}">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nombre completo')" />
        
                    <x-input id="alumno" class="block mt-1 w-full" type="text" name="alumno" :value="old('name')" required autofocus />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="name" :value="__('No Control')" />
        
                    <x-input id="control" class="block mt-1 w-full" type="text" name="control" :value="old('name')" required />
                </div>
                <div>
                    <x-label for="name" :value="__('Sugerencias')" />
                    {{-- <x-textarea id="sugerencia" type="text" name="sugerencia" /> --}}
                    <x-input id="sugerencia" class="block mt-1 w-full" type="text" name="sugerencia" :value="old('name')" required />
                </div>                            
                <div class="flex items-center justify-end mt-4">                
        
                    <x-button class="ml-4">
                        {{ __('Guardar') }}
                    </x-button>
                </div>
            </form>  
            {{-- tabla --}}
            <div class="flex flex-col pt-5">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              No Control
                            </th>                    
                            <th scope="col" class="relative px-6 py-3">
                                SUGERENCIA                                             
                            </th>
                          </tr>
                        </thead> 
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($sug as $item)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">                        
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                    {{$item->alumno}}
                                  </div>                          
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">{{$item->control}}</div>                      
                            </td>     
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$item->sugerencia}}</div>                      
                              </td>                                                             
                          </tr>   
                          @endforeach  
                          <!-- More items... -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div> 
            <div class="pb-3">
              <footer>
                <div class="pt-12">
                  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                      Usuarios registrados: {{$num}}
                  </h2>
                </div>
              </footer>
            </div>                      
        </div>
    </div>    
</x-app-layout>
