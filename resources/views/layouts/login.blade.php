<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your common styles -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .left-panel {
            float: left;
            width: 35%;
            background: #fff;
            color: #fff;
            padding: 20px;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        .right-panel {
            margin-left: 35%;
            height: 42vh;
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo-container {
            max-width: 60%;
            height: auto;
            margin-bottom: 20px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
            margin-right: 20px;
        }

        .instansi {
            color: #fff;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 20px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, p, label {
            color: #000000; /* Set text color */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .remember-me {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
        }

        button {
            width: 100%;
            background: #d1a206;
            color: #d1a206;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!-- Navbar content -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>