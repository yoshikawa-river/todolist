<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <div>
                        <p>{{ __('Task Name') }}</p>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </div>

                    <div>
                        <p>{{ __('Task Description') }}</p>
                        <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <p>{{ __('Priority') }}</p>
                        {{ App\Enums\Priority::HIGH->label() }}
                        <input type="radio" name="priority" value="{{ App\Enums\Priority::HIGH->value }}"
                            @checked(old('priority') == App\Enums\Priority::HIGH->value)>
                        {{ App\Enums\Priority::MIDDLE->label() }}
                        <input type="radio" name="priority" value="{{ App\Enums\Priority::MIDDLE->value }}"
                            @checked(old('priority') == App\Enums\Priority::MIDDLE->value)>
                        {{ App\Enums\Priority::LOW->label() }}
                        <input type="radio" name="priority" value="{{ App\Enums\Priority::LOW->value }}"
                            @checked(old('priority') == App\Enums\Priority::LOW->value)>
                    </div>

                    <div>
                        <p>{{ __('Public') }}</p>
                        <input type="checkbox" name="public" value="1" @checked(old('public') == 1)>
                    </div>

                    <div>
                        <p>{{ __('Due Date') }}</p>
                        <input type="date" name="due_date" value="{{ old('due_date') }}">
                    </div>

                    <input type="submit" name="confirm" value="確認">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
