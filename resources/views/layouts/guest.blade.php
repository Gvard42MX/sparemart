<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Warung Nayamul') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-amber-50">
    {{-- Tanpa card Breeze, langsung render slot --}}
    <div class="min-h-screen">
        {{ $slot }}
    </div>
</body>
</html>
