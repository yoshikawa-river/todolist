<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ $route }}" method="POST">
                @if ($params->get('id'))
                    @method('PATCH')
                @endif

                @csrf
                <div>
                    <p>{{ __('Task Name') }}</p>
                    <div>{{ $params->get('task_name') }}</div>
                    <input type="hidden" name="task_name" value="{{ $params->get('task_name') }}">
                </div>

                <div>
                    <p>{{ __('Task Description') }}</p>
                    <div>{{ $params->get('task_description') }}</div>
                    <input type="hidden" name="task_description" value="{{ $params->get('task_description') }}">
                </div>

                <div>
                    <p>{{ __('Priority') }}</p>
                    <div>{{ App\Enums\Priority::find($params->get('priority')) }}</div>
                    <input type="hidden" name="priority" value="{{ $params->get('priority') }}">
                </div>

                <div>
                    <p>{{ __('Public') }}</p>
                    <div>{{ $params->get('public') }}</div>
                    <input type="hidden" name="public" value="{{ $params->get('public') }}">
                </div>

                <div>
                    <p>{{ __('Due Date') }}</p>
                    <div>{{ $params->get('due_date') }}</div>
                    <input type="hidden" name="due_date" value="{{ $params->get('due_date') }}">
                </div>

                <div>
                    <p>{{ __('Tags') }}</p>
                    <div>
                        @foreach ($params->get('tags') as $tag)
                            <p>{{ $tag['tag_name'] }}</p>
                            <input type="hidden" name="tags[{{ $loop->index }}][tag_name]"
                                value="{{ $tag['tag_name'] }}">
                        @endforeach
                    </div>
                </div>

                <input type="submit" name="back" value="戻る">
                <input type="submit" name="create" value="{{ $submit }}">
            </form>
        </div>
    </div>
</div>
