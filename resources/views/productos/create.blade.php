<x-app-layout>
    <div class="form-container">
        <h2 class="form-title">📦 Registrar Nuevo Producto</h2>

        <form action="{{ route('productos.store') }}" method="POST" class="almacen-form">
            @csrf

            <div class="form-group">
                <label class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-input" placeholder="Ej. Martillo de Acero" required>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-input form-textarea" placeholder="Detalles técnicos, marca, etc."></textarea>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Stock Inicial</label>
                    <input type="number" name="stock" class="form-input" placeholder="0" min="0" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Precio (Unitario)</label>
                    <input type="number" step="0.01" name="precio" class="form-input" placeholder="0.00"
                        min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Almacén de Destino</label>
                <select name="almacen_id" class="form-input form-select" required>
                    <option value="">-- Seleccione una ubicación --</option>
                    @foreach ($almacenes as $a)
                        <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-input form-select">
                    <option value="activo">✅ Activo</option>
                    <option value="inactivo">❌ Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn-submit btn-product">
                Registrar Producto
            </button>
        </form>
    </div>
</x-app-layout>

<style>
    :root {
        --product-color: #6366f1;
        --product-hover: #4f46e5;
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
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
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
        border: 1.5px solid var(--border-color);
        border-radius: 0.6rem;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--product-color);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-textarea {
        min-height: 80px;
        resize: none;
    }

    .btn-product {
        width: 100%;
        background-color: var(--product-color);
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 0.6rem;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        margin-top: 1rem;
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-product:hover {
        background-color: var(--product-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }
</style>
