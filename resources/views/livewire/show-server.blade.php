<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Server #{{ $server->id }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-server.progress-list>
            @foreach($server->tasks as $task)
                <x-server.progress-item :task="$task" />
            @endforeach
        </x-server.progress-list>
    </div>
</div>
