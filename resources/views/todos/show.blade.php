@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4">
        <h1 class="text-black-100 text-2xl pb-4">{{$todo->title}}</h1> <!-- Title Section -->
        <a class="mx-5 py-2 text-blue-400 cursor-pointer" href="{{route('todos.index')}}"> <!-- Back Button -->
            <span class="fas fa-arrow-alt-circle-left" style='font-size:36px'/>
        </a>
    </div>

    <div>
        <!-- Description Section -->
        <div class="p-2">
            <h3 class="text-lg">Description:</h3>
            <p>{{$todo->description}}</p>
        </div>

        <!-- Steps Section -->
        @if($todo->steps->count() > 0)
            <div class="p-2">
                <h3 class="text-lg">Step for this task:</h3>
                @foreach($todo->steps as $step)
                    <p>{{ $step->name }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
