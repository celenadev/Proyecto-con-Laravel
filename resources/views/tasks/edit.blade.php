<x-layout>
    <x-slot:headding>
        <div class="text-center bg-primary text-white p-3">
            Edit Task: {{ $task->description }}
        </div>
    </x-slot:headding>

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit a Task</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Task details</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="description"
                               class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="description"
                                    id="description"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="task details"
                                    value="{{ $task->description }}"
                                    required>
                            </div>

                            @error('description')
                            <p class="text-xs text-red-500 font-semibold mt-1">
                                {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="estado" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text"
                                       name="estado"
                                       id="estado"
                                       class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                       placeholder="task status"
                                       value="{{ $task->estado }}"
                                       required>
                            </div>
                            @error('estado')
                            <p class="text-xs text-red-500 font-semibold mt-1">
                                {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900">User</label>
                        {{--                        estamos usando una comparación en la línea del option para cada usuario
                        Si el id del usuario coincide con el id del usuario de la tarea ($task->user_id), entonces marcamos esa opción como seleccionada--}}
                        <select id="user_id" name="user_id" required>
                            <option value="" disabled {{ $task->user_id ? '' : 'selected' }}>Assign the task to a user
                            </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <p class="text-xs text-red-500 font-semibold mt-1">
                            {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <div class="flex items-center gap-x-6">
                {{--            Para que vuelva atrás nuevamente--}}
                <a href="/tasks/{{ $task ->id}}" type="button"
                   class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <div>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>

        </div>
    </form>

</x-layout>
