@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4">
        <h1 class="text-black-100 text-2xl pb-4">Edit Your TODO:</h1>
        <a class="mx-5 py-2 text-blue-400 cursor-pointer" href="{{route('todos.index')}}">
            <span class="fas fa-arrow-alt-circle-left" style='font-size:36px'/>
        </a>
    </div>

    <x-alert/> <!-- Message for creating a todo -->

    <form method="post" action="{{route('todos.update', $todo->id)}}" class="py-5">
    @csrf
    @method('put')
    <!-- Title Field -->
        <div class="py-1">
            <input type="text" name="title" value="{{$todo->title}}" class="px-2 py-2 border rounded"
                   placeholder="Title.."/>
        </div>

        <!-- Description Field -->
        <div class="py-1">
            <textarea name="description" class="p-2 border rounded"
                      placeholder="Description..">{{$todo->description}}</textarea>
        </div>

        <!-- Update Button -->
        <div class="py-1">
            <input type="submit" value="Update" class="p-2 border rounded"/>
        </div>

    </form>
@endsection
