<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div style="display: flex">
                        <p>{{ __('Task Name') }}</p>|
                        <p>{{ __('Task Create Date') }}</p>|
                        <p>{{ __('Task Priority') }}</p>|
                        <p>{{ __('Task Author') }}</p>|
                        <p>{{ __('Task Tags') }}</p>
                    </div>
                    @foreach ($tasks as $task)
                        <div>
                            <a href="{{ route('task.show', ['task' => $task->id]) }}">{{ $task->task_name }}</a>
                            {{ $task->created_at->format('Y-m-d') }}
                            {{ \App\Enums\Priority::find($task->priority) }}
                            {{ $task->user->name }}
                            |
                            @foreach ($task->tags as $tag)
                                {{ $tag->tag_name }}
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
