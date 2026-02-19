<x-app-layout>
    <div class="form-container">
        <h2 class="form-title">Editar Almacén: {{ $almacen->nombre }}</h2>

        <form action="{{ route('almacenes.update', $almacen->id) }}" method="POST" class="almacen-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nombre del Almacén</label>
                <input type="text" name="nombre" class="form-input" value="{{ $almacen->nombre }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-input" value="{{ $almacen->ubicacion }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-input form-textarea">{{ $almacen->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Estado de Operación</label>
                <select name="estado" class="form-input form-select">
                    <option value="activo" {{ $almacen->estado == 'activo' ? 'selected' : '' }}>✅ Activo</option>
                    <option value="inactivo" {{ $almacen->estado == 'inactivo' ? 'selected' : '' }}>❌ Inactivo</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit btn-update">
                    Actualizar Almacén
                </button>
                <a href="{{ route('almacenes.index') }}" class="btn-link">Cancelar y Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>

<style>
    :root {
        --update-color: #10b981;
        /* Verde esmeralda para ediciones */
        --update-hover: #059669;
        --text-muted: #64748b;
        --primary-color: #4f46e5;
        --border-color: #e2e8f0;
        --text-main: #1e293b;
    }

    .form-container {
        max-width: 550px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: 'Inter', sans-serif;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .almacen-form {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

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

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--update-color);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
    }

    .form-textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* Contenedor de botones */
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 1.5rem;
        text-align: center;
    }

    .btn-update {
        width: 100%;
        background-color: var(--update-color);
        color: white;
        padding: 0.8rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-update:hover {
        background-color: var(--update-hover);
        transform: translateY(-1px);
    }

    .btn-link {
        font-size: 0.875rem;
        color: var(--text-muted);
        text-decoration: none;
        transition: color 0.2s;
    }

    .btn-link:hover {
        color: var(--text-main);
        text-decoration: underline;
    }
</style>
