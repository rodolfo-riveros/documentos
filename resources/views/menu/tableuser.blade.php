<div class="p-4">
    {{-- title --}}
    <div class="flex-row items-center p-5 card">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold text-gray-900">Tabla de usuarios</h2>
            <div class="w-10 h-10 text-blue-700 bg-blue-100 rounded flex-none ml-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-5 h-5 mx-auto">
                    <path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 0v64h64V96H64zm384 0H192v64H448V96zM64 224v64h64V224H64zm384 0H192v64H448V224zM64 352v64h64V352H64zm384 0H192v64H448V352z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="border-4 border-dashed rounded h-auto">
        <table class="w-full text-sm text-left text-gray-500 p-5">
            <thead class="text-xs text-blue-800 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        N°
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombres y apellidos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo electrónico
                    </th>
                    <th scope="col" class="px-6 py-3">
                        editar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        eliminar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b hover:bg-blue-100 dark:hover:bg-blue-120">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            <button class="px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring focus:border-blue-300" x-on:click.prevent="$dispatch('open-modal', 'edit')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor" class="w-5 h-5 mx-auto">
                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                </svg>
                            </button>
                        </td>
                        <x-modal name="edit" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="POST" action="{{ route('docu.users.update', $user->id) }}" class="p-6">
                                @csrf
                                @method('PUT')
                                {{-- @foreach ($roles as $role)
                                    <div class="flex items-center">
                                        <input
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            type="checkbox"
                                            name="roles[]"
                                            value="{{ $role->id }}"
                                            id="role{{ $role->id }}"
                                            {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}
                                        >
                                        <label
                                            class="ml-2 block text-sm text-gray-900"
                                            for="role{{ $role->id }}"
                                        >
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach --}}
                                <div class="p-6 mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close', 'edit')">
                                        {{ __('Cancelar') }}
                                    </x-secondary-button>
                                    <x-primary-button class="ms-3">
                                        {{ __('Asignar rol') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                        <td class="px-6 py-4">
                            <form action="{{ route('docu.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="w-5 h-5 mx-auto">
                                        <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
