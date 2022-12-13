<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('task.edit', $task->id) }}">{{ __('Edit') }}</a>
                    <div>
                        <h1>{{ $task->task_name }}</h1>
                        <div>
                            <p>{{ __('Task Create Date') }}</p>
                            <div>{{ $task->created_at->format('Y-m-d') }}</div>
                        </div>

                        <div>
                            <p>{{ __('Task Author') }}</p>
                            <div>{{ $task->user->name }}</div>
                        </div>
                    </div>
                    <div>
                        <p>{{ __('Task Description') }}</p>
                        <div>{{ $task->task_description }}</div>
                    </div>
                    <div>
                        <p>{{ __('Task Priority') }}</p>
                        <div>{{ \App\Enums\Priority::find($task->priority) }}</div>
                    </div>
                    <div>
                        <p>{{ __('Task Public') }}</p>
                        <div>{{ $task->public }}</div>
                    </div>
                    <div>
                        <p>{{ __('Task Due Date') }}</p>
                        <div>{{ $task->due_date->format('Y-m-d') }}</div>
                    </div>
                    <div>
                        <p>{{ __('Task Tags') }}</p>
                        @foreach ($task->tags as $tag)
                            <div>{{ $tag->tag_name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
