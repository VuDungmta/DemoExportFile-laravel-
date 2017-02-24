<html>
<head>
<title>
app-name @yield('title')
</title>
</head>
<body>
 @section('sidebar')
            <h3>Đây là sidebar chính.</h3>
        @show
 
        <div class="container">
            @yield('content')
        </div>

<body>

</html>
