@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task!</a>
    </nav>

    @forelse ($tasks as $task)
        <ul class="list-disc">
            <li>
                <span>
                  <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through text-red-500' => $task->completed, 'text-green-800' => !$task->completed])>{{ $task->title }}</a>
                </span>
            </li>
        </ul>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
