<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS básico -->
    <link rel="stylesheet" href="{{ asset('css/app-basic.css') }}">
</head>

<body>

    <div class="page">

        <!-- Navigation -->
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="{{ route('dashboard') }}">LOGO</a>
                </div>
                <div class="links">
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Panel</a>
                    <a href="{{ route('profile.edit') }}">Perfil</a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit">Cerar Sesion</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="page-header">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="page-content">
            <div class="container">
                {{ $slot }}
            </div>
        </main>

    </div>

</body>

</html>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f3f4f6;
        color: #111;
    }

    .page {
        min-height: 100vh;
    }

    /* Navbar */
    .navbar {
        background: white;
        border-bottom: 1px solid #ddd;
    }

    .navbar .container {
        max-width: 1200px;
        margin: auto;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar .logo a {
        text-decoration: none;
        font-weight: bold;
        color: #333;
    }

    .navbar .links {
        display: flex;
        align-items: center;
    }

    .navbar .links a {
        text-decoration: none;
        color: #555;
        margin-left: 15px;
    }

    .navbar .links a.active {
        color: black;
        font-weight: bold;
    }

    .logout-form {
        display: inline;
    }

    .logout-form button {
        background: none;
        border: none;
        color: #555;
        cursor: pointer;
        margin-left: 15px;
    }

    /* Page Header */
    .page-header {
        background: white;
        border-bottom: 1px solid #ddd;
        padding: 20px 0;
    }

    .page-header h1 {
        font-size: 24px;
        color: #111;
    }

    /* Page Content */
    .page-content {
        padding: 20px 0;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar .links {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar .links a,
        .logout-form button {
            margin: 8px 0;
        }
    }
</style>
