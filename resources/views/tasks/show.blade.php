<x-layout>
    <x-slot:headding>

        Tarea

    </x-slot:headding>

    <div class="container mt-5">
        <h1 class="text-center text-primary text-lg my-4 font-bold">Detalles de la Tarea</h1>
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <h2 class=" text-lg "> Detalles sobre la tarea: {{$task['description']}}</h2>

            <p>Usuario: {{$task->user['first_name']}} {{ $task->user['last_name']}}</p>

            @foreach ($task->tags as $tag)
                <p>TAG {{$tag->name}}</p>
            @endforeach
            <p class="mt-3">
                <span class="font-weight-bold">Estado de la Tarea:</span> <span
                    class="badge {{ $task['estado'] == 'Pendiente' ? 'badge-danger' : ($task['estado'] == 'Completada' ? 'badge-success' : ($task['estado'] == 'En pausa' ? 'badge-warning' : ($task['estado'] == 'En progreso' ? 'badge-info' : 'badge-secondary'))) }}">{{$task['estado']}}</span>
            </p>

            <div style="margin-left: auto;">

                <div>
                    <p class="display: inline-block">
                        <button class="border border-gray-300 leading-5 rounded-md text-red-500 text-sm font-bold px-4 py-2 m-3" form="delete-form">Eliminar</button>
                    </p>
                    <p class=" display: inline-block">
                        <x-button href="/tasks/{{$task->id}}/edit">Editar</x-button>
                    </p>

                </div>
                <form action="/tasks/{{$task->id}}" method="POST" id="delete-form" class="hidden">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit">Eliminar</x-button>
                </form>
                <div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

