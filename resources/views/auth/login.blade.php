<x-guest-layout>
    <!-- Estado de la sesión -->
    @if (session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <!-- Correo Electrónico -->
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username">
            @if ($errors->has('email'))
                <div class="input-error">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Contraseña -->
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="input-error">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Recordarme -->
        <div class="form-group remember-me">
            <label>
                <input type="checkbox" name="remember">
                <span>Recordarme</span>
            </label>
        </div>

        <!-- Acciones -->
        <div class="form-actions">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">¿Olvidaste tu contraseña?</a>
            @endif

            <button type="submit" class="primary-button">Iniciar sesión</button>
        </div>
    </form>
</x-guest-layout>


<style>
    :root {
        --bg-color: #f3f4f6;
        --card-bg: #ffffff;
        --text-color: #111;
        --muted-color: #666;
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --error-color: #dc2626;
        --shadow-color: rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: Arial, sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
        margin: 0;
        padding: 0;
    }

    /* Session Status */
    .session-status {
        background: #d1fae5;
        color: #065f46;
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 15px;
        text-align: center;
    }

    /* Form */
    .auth-form {
        width: 100%;
        max-width: 400px;
        margin: auto;
        background: var(--card-bg);
        padding: 32px;
        border-radius: 12px;
        box-shadow: 0 8px 16px var(--shadow-color);
    }

    /* Form Group */
    .form-group {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 6px;
        font-weight: bold;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: border 0.2s ease;
    }

    .form-group input:focus {
        border-color: var(--primary-color);
    }

    /* Input error */
    .input-error {
        margin-top: 5px;
        font-size: 13px;
        color: var(--error-color);
    }

    /* Remember Me */
    .remember-me {
        display: flex;
        align-items: center;
    }

    .remember-me input[type="checkbox"] {
        margin-right: 8px;
    }

    /* Actions */
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .forgot-password {
        font-size: 13px;
        color: var(--muted-color);
        text-decoration: underline;
        margin-bottom: 10px;
    }

    .forgot-password:hover {
        color: var(--text-color);
    }

    .primary-button {
        background-color: var(--primary-color);
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.2s ease;
    }

    .primary-button:hover {
        background-color: var(--primary-hover);
    }

    /* Responsive */
    @media (max-width: 480px) {
        .auth-form {
            padding: 24px;
            border-radius: 8px;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .primary-button {
            width: 100%;
        }
    }
</style>
