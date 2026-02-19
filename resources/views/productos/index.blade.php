<x-app-layout>
    <div class="index-container">
        <div class="index-header">
            <h2 class="index-title">📦 Inventario de Productos</h2>
            <a href="{{ route('productos.create') }}" class="btn-create-prod">
                <span>+</span> Agregar Producto
            </a>
        </div>

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Almacén</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $p)
                        <tr>
                            <td class="td-id">#{{ $p->id }}</td>
                            <td>
                                <div class="product-info">
                                    <span class="product-name">{{ $p->nombre }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="stock-badge {{ $p->stock <= 10 ? 'stock-low' : 'stock-ok' }}">
                                    {{ $p->stock }} uds.
                                </span>
                            </td>
                            <td class="product-price">${{ number_format($p->precio, 2) }}</td>
                            <td>
                                <span class="almacen-tag">
                                    📍 {{ $p->almacen->nombre ?? 'Sin almacén' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $p->estado == 'activo' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ ucfirst($p->estado) }}
                                </span>
                            </td>
                            <td class="td-actions">
                                <a href="{{ route('productos.edit', $p->id) }}" class="btn-edit">Editar</a>

                                <form action="{{ route('productos.destroy', $p->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('¿Eliminar definitivamente este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<style>
    :root {
        --prod-primary: #6366f1;
        --prod-success: #10b981;
        --prod-danger: #ef4444;
        --prod-warning: #f59e0b;
        --bg-card: #ffffff;
    }

    .index-container {
        max-width: 1100px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: 'Inter', sans-serif;
    }

    .index-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .btn-create-prod {
        background-color: var(--prod-primary);
        color: white;
        padding: 0.7rem 1.4rem;
        border-radius: 0.8rem;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-create-prod:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    }

    .table-responsive {
        background: var(--bg-card);
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th {
        background-color: #f8fafc;
        padding: 1.2rem;
        font-size: 0.8rem;
        color: #64748b;
        text-transform: uppercase;
        border-bottom: 2px solid #edf2f7;
    }

    .custom-table td {
        padding: 1rem 1.2rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .product-name {
        font-weight: 700;
        color: #1e293b;
        display: block;
    }

    .product-price {
        font-family: 'Courier New', Courier, monospace;
        font-weight: 700;
        color: #0f172a;
    }

    .stock-badge {
        padding: 0.3rem 0.7rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .stock-low {
        background: #fff7ed;
        color: #9a3412;
        border: 1px solid #ffedd5;
    }

    .stock-ok {
        background: #f0fdf4;
        color: #166534;
        border: 1px solid #dcfce7;
    }

    .almacen-tag {
        font-size: 0.85rem;
        color: #475569;
        background: #f1f5f9;
        padding: 4px 8px;
        border-radius: 4px;
    }

    .badge {
        padding: 0.2rem 0.6rem;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 800;
    }

    .badge-active {
        background: #10b981;
        color: white;
    }

    .badge-inactive {
        background: #94a3b8;
        color: white;
    }

    .td-actions {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        color: var(--prod-primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .btn-delete {
        background: none;
        border: none;
        color: var(--prod-danger);
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .btn-delete:hover,
    .btn-edit:hover {
        text-decoration: underline;
    }
</style>
