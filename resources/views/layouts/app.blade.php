<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-indigo-600">MyApp</a>
            <div>
                <a href="/dashboard" class="text-gray-700 hover:text-indigo-600 mx-2">Dashboard</a>
                <a href="/" class="text-gray-700 hover:text-indigo-600 mx-2">Home</a>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
