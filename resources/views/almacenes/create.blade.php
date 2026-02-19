<x-app-layout>
    <div class="form-container">
        <h2 class="form-title">Crear Nuevo Almacén</h2>

        <form action="{{ route('almacenes.store') }}" method="POST" class="almacen-form">
            @csrf

            <div class="form-group">
                <label class="form-label">Nombre del Almacén</label>
                <input type="text" name="nombre" class="form-input" placeholder="Ej. Almacén Central" required>
            </div>

            <div class="form-group">
                <label class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-input" placeholder="Ej. Av. Principal 123" required>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-input form-textarea" placeholder="Breve descripción del inventario..."></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Estado de Operación</label>
                <select name="estado" class="form-input form-select">
                    <option value="activo">✅ Activo</option>
                    <option value="inactivo">❌ Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">
                Guardar Almacén
            </button>
        </form>
    </div>
</x-app-layout>

<Style>
    :root {
        --primary-color: #4f46e5;
        /* Azul moderno */
        --primary-hover: #4338ca;
        --bg-color: #f8fafc;
        --text-main: #1e293b;
        --border-color: #e2e8f0;
    }

    /* Contenedor externo */
    .form-container {
        max-width: 550px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: 'Inter', system-ui, sans-serif;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* El card del formulario */
    .almacen-form {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    /* Grupos de campos */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    /* Inputs, Select y Textarea */
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        background-color: #ffffff;
        font-size: 1rem;
        color: var(--text-main);
        transition: all 0.2s ease-in-out;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }

    .form-textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* Botón de acción */
    .btn-submit {
        width: 100%;
        background-color: var(--primary-color);
        color: white;
        padding: 0.8rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.1s ease;
        margin-top: 1rem;
    }

    .btn-submit:hover {
        background-color: var(--primary-hover);
    }

    .btn-submit:active {
        transform: scale(0.98);
    }
</Style>
