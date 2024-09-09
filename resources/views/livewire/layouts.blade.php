<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Layout</title>
    @livewireStyles
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
 