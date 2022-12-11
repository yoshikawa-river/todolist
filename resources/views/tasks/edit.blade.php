<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    @include('tasks.form', ['route' => route('task.update', ['task' => $task->id])])
</x-app-layout>
