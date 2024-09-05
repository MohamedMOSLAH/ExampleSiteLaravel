<!DOCTYPE html>
<html>
<head>
    <title>Site Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    @livewire('navigation-menu')
    
    <div class="container">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
