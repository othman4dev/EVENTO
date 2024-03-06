<!DOCTYPE html>
<html lang="en" class="login-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{asset('assets/LOGO.svg')}}" type="image/x-icon">
    <title>QuickTable | Welcome back</title>
</head>
<body class="login-body">
    <header class="index-header">
        <h1 class="login-h1"><img src="assets/LOGO.svg" class="table-icon" alt=""></h1>
        <div class="logins">
            <button class="log">Login</button>
            <button class="log">Register</button>
        </div>
    </header>
    @yield('content')
</body>
</html>
<script src="js/script.js" defer></script>{{--7614--}}