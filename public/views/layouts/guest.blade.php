<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <div class="auth-page">
        <div class="logo">
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
<style>
    :root {
        --bg-color: #f3f4f6;
        --card-bg: #ffffff;
        --text-color: #111;
        --muted-color: #666;
        --shadow-color: rgba(0, 0, 0, 0.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Figtree', Arial, sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
    }

    .auth-page {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .logo {
        margin-bottom: 24px;
    }

    .logo a {
        font-size: 26px;
        font-weight: bold;
        color: var(--muted-color);
        text-decoration: none;
    }

    .auth-card {
        width: 100%;
        max-width: 400px;
        background-color: var(--card-bg);
        padding: 32px;
        border-radius: 12px;
        box-shadow: 0 8px 16px var(--shadow-color);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .auth-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px var(--shadow-color);
    }

    /* Responsive */
    @media (max-width: 480px) {
        .auth-card {
            padding: 24px;
            border-radius: 8px;
        }

        .logo a {
            font-size: 22px;
        }
    }
</style>
