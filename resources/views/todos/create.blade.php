@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b px-4 pb-4">
        <h1 class="text-black-100 text-2xl pb-4">What you need TODO?</h1>
        <a class="mx-5 py-2 text-blue-400 cursor-pointer" href="{{route('todos.index')}}">
            <span class="fas fa-arrow-alt-circle-left" style='font-size:36px'/>
        </a>
    </div>

    <x-alert/> <!-- Message for creating a todo -->

    <form method="post" action="{{route('todos.store')}}" class="py-5">
    @csrf
    <!-- Title Field -->
        <div class="py-1">
            <input type="text" name="title" class="p-2 border rounded" placeholder="Title.."/>
        </div>
        <!-- Description Field -->
        <div class="py-1">
            <textarea name="description" class="p-2 border rounded" placeholder="Description.."></textarea>
        </div>

        <!-- Steps Field -->
        <div class="py-2">
            @livewire('step')
        </div>

        <!-- Create Button -->
        <div class="py-1">
            <input type="submit" value="Create" class="p-2 border rounded"/>
        </div>
    </form>
@endsection

