<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Confirm Task') }}
    </h2>
</x-slot>

<x-app-layout>
    @include('tasks.confirm', ['route' => route('task.store'), 'submit' => '作成'])
</x-app-layout>
