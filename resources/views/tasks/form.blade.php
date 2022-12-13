<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ $route }}" method="POST">
                @if ($task->id ?? null)
                    @method('PATCH')
                @endif
                @csrf
                <div>
                    <p>{{ __('Task Name') }}</p>
                    <input type="text" name="task_name" value="{{ old('task_name', $task->task_name ?? null) }}"
                        required>
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <p>{{ __('Task Description') }}</p>
                    <textarea name="task_description" id="" cols="30" rows="10" required>{{ old('task_description', $task->task_description ?? null) }}</textarea>
                    @error('description')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <p>{{ __('Priority') }}</p>
                    {{ App\Enums\Priority::HIGH->label() }}
                    <input type="radio" name="priority" value="{{ App\Enums\Priority::HIGH->value }}"
                        @checked(old('priority', $task->priority ?? null) == App\Enums\Priority::HIGH->value)>
                    {{ App\Enums\Priority::MIDDLE->label() }}
                    <input type="radio" name="priority" value="{{ App\Enums\Priority::MIDDLE->value }}"
                        @checked(old('priority', $task->priority ?? null) == App\Enums\Priority::MIDDLE->value)>
                    {{ App\Enums\Priority::LOW->label() }}
                    <input type="radio" name="priority" value="{{ App\Enums\Priority::LOW->value }}"
                        @checked(old('priority', $task->priority ?? null) == App\Enums\Priority::LOW->value)>
                    @error('priority')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <p>{{ __('Public') }}</p>
                    <input type="checkbox" name="public" value="1" @checked(old('public', $task->public ?? null) == 1)>
                    @error('public')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <p>{{ __('Due Date') }}</p>
                    <input type="date" name="due_date"
                        value="{{ old('due_date', optional($task->due_date ?? null)->format('Y-m-d')) }}" required>
                    @error('due_date')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <p>{{ __('Task Tag') }}</p>

                    <div id="tag">
                        @if (old('tags', $task->tags ?? null))
                            @foreach ($task->tags as $tag)
                                <div class="flex tag_content">
                                    <input type="text" name="tags[{{ $loop->index }}]"
                                        value="{{ old('tags', $tag ?? null) }}">
                                    @if ($loop->first)
                                        <div class="add_tag">追加</div>
                                    @else
                                        <div class="remove_tag">削除</div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="flex tag_content">
                                <input type="text" name="tags[0]">
                                <div class="add_tag">追加</div>
                                <div class="remove_tag hidden">削除</div>
                            </div>
                        @endif
                    </div>
                </div>

                <input type="submit" name="confirm" value="確認">
            </form>
        </div>
    </div>
</div>
