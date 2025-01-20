<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="bg-gray-100">

    <x-layouts.header />

    <div class="container mx-auto px-4 py-6">
        @if (session()->has('success'))
            <div class="max-w-4xl mx-auto mt-4 px-4">
                <div class="bg-green-500 text-white p-3 rounded text-sm">
                    {{ session()->get('success') }}
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse ($todos as $todo)
                <x-layouts.card :todo="$todo" class="shadow-md rounded-lg p-4 bg-white"/>
                
            @empty
            <div class="col-span-full text-center text-gray-500 mt-8">
                <p>No todos found</p>
            </div>
            @endforelse
        </div>
    </div>

    <script>
        $(document).ready(function () {
            @foreach ($todos as $todo)
                $("#openEditModal{{ $todo->id }}").click(function () {
                    $("#editModal{{ $todo->id }}").show();
                });

                $("#closeEditModal{{ $todo->id }}").click(function () {
                    $("#editModal{{ $todo->id }}").hide();
                });

                $("#openDeleteModal{{ $todo->id }}").click(function () {
                    $("#deleteModal{{ $todo->id }}").show();
                });

                $("#closeDeleteModal{{ $todo->id }}").click(function () {
                    $("#deleteModal{{ $todo->id }}").hide();
                });
            @endforeach

            
        });
    </script>

</body>
</html>
