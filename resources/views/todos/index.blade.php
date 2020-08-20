@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4">
        <h1 class="text-black-100 text-2xl">All Your TODOS:</h1>

        <a href="{{route('todos.create')}}" class="mx-5 py-2 text-blue-400 cursor-pointer">
            <span class="fas fa-plus-circle" style='font-size:36px'/>
        </a>
    </div>

    <ul class="my-5">
        <x-alert/> <!-- Message for updating a todo -->

        @forelse($todos as $todo)
            <li class="flex justify-between p-2">

                <!-- Complete Button (Mark) -->
                <div>
                    @include('todos.completeButton')
                </div>

                <!-- Todo Title -->
                @if($todo->completed)
                    <p class="line-through">{{$todo->title}}</p>
                @else
                    <a class="cursor-pointer" href="{{route('todos.show', $todo->id)}}">{{$todo->title}}</a>
                @endif

                <div>
                    <!-- Edit Button -->
                    <a href="{{route('todos.edit', $todo->id)}}" class="text-orange-400 cursor-pointer">
                        <span class="fas fa-edit px-2"/>
                    </a>

                    <!-- Delete Button -->
                    <span
                        onclick="event.preventDefault();
                            if(confirm('Are you really want to delete?')) {
                            document.getElementById('form-destroy-{{$todo->id}}').submit() }"
                        class="text-red-400 cursor-pointer fas fa-trash px-2"/>

                    <form style="display:none" id="{{'form-destroy-'.$todo->id}}" method="post"
                          action="{{route('todos.destroy', $todo->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </div>

            </li>
        @empty
            <p>No task available, create one.</p>
        @endforelse
    </ul>
@endsection

