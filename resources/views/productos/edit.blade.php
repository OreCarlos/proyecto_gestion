<x-app-layout>
    <div class="form-container">
        <h2 class="form-title">✏️ Editar Producto: {{ $producto->nombre }}</h2>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="almacen-form edit-mode">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-input" value="{{ $producto->nombre }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-input form-textarea">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Stock Actual</label>
                    <input type="number" name="stock" class="form-input" value="{{ $producto->stock }}"
                        min="0" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Precio Unitario</label>
                    <input type="number" step="0.01" name="precio" class="form-input"
                        value="{{ $producto->precio }}" min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Ubicación (Almacén)</label>
                <select name="almacen_id" class="form-input form-select" required>
                    <option value="">-- Seleccione un almacén --</option>
                    @foreach ($almacenes as $a)
                        <option value="{{ $a->id }}" {{ $producto->almacen_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Estado de Disponibilidad</label>
                <select name="estado" class="form-input form-select">
                    <option value="activo" {{ $producto->estado == 'activo' ? 'selected' : '' }}>✅ Activo</option>
                    <option value="inactivo" {{ $producto->estado == 'inactivo' ? 'selected' : '' }}>❌ Inactivo
                    </option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit btn-update-prod">
                    Guardar Cambios
                </button>
                <a href="{{ route('productos.index') }}" class="btn-cancel">Volver al listado</a>
            </div>
        </form>
    </div>
</x-app-layout>
<style>
    :root {
        --edit-color: #f59e0b;
        /* Ámbar/Naranja para edición */
        --edit-hover: #d97706;
        --text-main: #1e293b;
        --border-color: #e2e8f0;
    }

    .form-container {
        max-width: 650px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: 'Inter', sans-serif;
    }

    .form-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--text-main);
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .almacen-form {
        background: #ffffff;
        padding: 2.5rem;
        border-radius: 1.2rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    /* Indicador visual de que estamos editando */
    .edit-mode {
        border-top: 5px solid var(--edit-color);
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.4rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 0.6rem;
        font-size: 1rem;
        transition: all 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--edit-color);
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-textarea {
        min-height: 80px;
        resize: vertical;
    }

    .form-actions {
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .btn-update-prod {
        width: 100%;
        background-color: var(--edit-color);
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 0.6rem;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-update-prod:hover {
        background-color: var(--edit-hover);
        transform: translateY(-2px);
    }

    .btn-cancel {
        text-align: center;
        color: #64748b;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .btn-cancel:hover {
        color: #1e293b;
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
</style>
