
<x-layout>
    <x-slot:headding>
        Inicio
    </x-slot:headding>

    <div class="space-y-4">
        @foreach($tasks as $task)
            <div class="block px-4 py-6 border border-gray-200 rounded-lg" style="display: flex; align-items: center;">

                <strong> {{ $task->description }} : </strong>
                <a href="/tasks/{{$task['id']}}">
                    <div class="font-bold text-blue-500 text-sm">
                        @if($task->user)
                            {{ $task->user->first_name }} {{ $task->user->last_name }}
                        @else
                            Usuario no asignado
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</x-layout>


