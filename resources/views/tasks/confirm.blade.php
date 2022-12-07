<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task Confirm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <div>
                        <p>{{ __('Task Name') }}</p>
                        <div>{{ $params->name }}</div>
                        <input type="hidden" name="name" value="{{ $params->name }}">
                    </div>

                    <div>
                        <p>{{ __('Task Description') }}</p>
                        <div>{{ $params->description }}</div>
                        <input type="hidden" name="description" value="{{ $params->description }}">
                    </div>

                    <div>
                        <p>{{ __('Priority') }}</p>
                        <div>{{ $params->priority }}</div>
                        <input type="hidden" name="priority" value="{{ $params->priority }}">
                    </div>

                    <div>
                        <p>{{ __('Public') }}</p>
                        <div>{{ $params->public }}</div>
                        <input type="hidden" name="public" value="{{ $params->public }}">
                    </div>

                    <div>
                        <p>{{ __('Due Date') }}</p>
                        <div>{{ $params->due_date }}</div>
                        <input type="hidden" name="due_date" value="{{ $params->due_date }}">
                    </div>

                    <input type="submit" name="back" value="戻る">
                    <input type="submit" name="create" value="作成">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
