<html>
<head>
    <title>App Name @yield('title')</title>
</head>
<body>
        @section('navbar')
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Contact</li>
                </ul>
            </nav>
        @show
    <div class="container">
        @yield('content')
    </div>
</body>
</html>