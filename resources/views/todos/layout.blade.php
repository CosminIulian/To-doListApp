<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> <!-- Tailwindcss -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/> <!-- Font Awesome -->

    @livewireStyles
    <title>{{ config('app.name') }}</title>
</head>

<body style="font-family: 'Nunito', sans-serif">
<!-- Nav bar -->
<ul class="flex justify-end p-1 shadow" style="background-color:#f8fafc">
    <!-- Home Menu -->
    <li class="mr-6 py-6">
        <a href="{{ url('/') }}" class="text-blue-400 cursor-pointer">
            <span class="fas fa-home" style='font-size:24px'/>
        </a>
    </li>
    <!-- User Home Menu -->
    <li class="mr-6 py-6">
        <a href="{{ url('/profile') }}" class="text-blue-400 cursor-pointer">
            <span class="fas fa-users-cog" style='font-size:24px'/>
        </a>
    </li>
    <!-- User Name -->
    <li class="mr-2 py-6">
        <span class="text-black-400">{{ Auth::user()->name }}</span>
    </li>
    <!-- User Avatar -->
    <li class="mr-2 pt-3">
        @if(Auth::user()->avatar)
            <img class="object-scale-down h-12 shadow" src="{{asset('storage/images/'. Auth::user()->avatar)}}"
                 alt="avatar"/>
        @endif
    </li>
</ul>

<div class="text-center flex justify-center pt-10">
    <div class="w-1/3 border bourder-gray-400 rounded py-4">
        @yield('content')
    </div>
</div>

@livewireScripts
</body>

</html>
