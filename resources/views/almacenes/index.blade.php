<x-app-layout>
    <div class="index-container">
        <div class="index-header">
            <h2 class="index-title">Gestión de Almacenes</h2>
            <a href="{{ route('almacenes.create') }}" class="btn-create">
                <span>+</span> Nuevo Almacén
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <span class="alert-icon">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacenes as $a)
                        <tr>
                            <td class="td-id">#{{ $a->id }}</td>
                            <td class="td-name">{{ $a->nombre }}</td>
                            <td>{{ $a->ubicacion }}</td>
                            <td class="td-desc">{{ $a->descripcion ?? 'Sin descripción' }}</td>
                            <td>
                                <span class="badge {{ $a->estado == 'activo' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ ucfirst($a->estado) }}
                                </span>
                            </td>
                            <td class="td-actions">
                                <a href="{{ route('almacenes.edit', $a->id) }}" class="btn-edit">Editar</a>

                                <form action="{{ route('almacenes.destroy', $a->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('¿Estás seguro de eliminar este almacén?')">
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
        --primary: #4f46e5;
        --success: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --text-dark: #1e293b;
        --text-light: #64748b;
        --bg-light: #f8fafc;
    }

    .index-container {
        max-width: 1000px;
        margin: 2rem auto;
        padding: 0 1.5rem;
        font-family: 'Inter', sans-serif;
    }

    /* Encabezado */
    .index-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .index-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--text-dark);
    }

    .btn-create {
        background-color: var(--primary);
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-create:hover {
        background-color: #4338ca;
    }

    /* Alerta de éxito */
    .alert-success {
        background-color: #ecfdf5;
        border-left: 4px solid var(--success);
        color: #065f46;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Tabla Estilizada */
    .table-responsive {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .custom-table thead {
        background-color: #f1f5f9;
    }

    .custom-table th {
        padding: 1rem;
        font-size: 0.85rem;
        text-transform: uppercase;
        color: var(--text-light);
        letter-spacing: 0.05em;
    }

    .custom-table td {
        padding: 1rem;
        border-bottom: 1px solid #f1f5f9;
        color: var(--text-dark);
        font-size: 0.95rem;
    }

    /* Badges de Estado */
    .badge {
        padding: 0.25rem 0.6rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .badge-active {
        background-color: #dcfce7;
        color: #166534;
    }

    .badge-inactive {
        background-color: #fee2e2;
        color: #991b1b;
    }

    /* Botones de Acción */
    .td-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn-edit,
    .btn-delete {
        padding: 0.4rem 0.8rem;
        border-radius: 0.4rem;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        border: none;
        transition: 0.2s;
    }

    .btn-edit {
        background-color: #eff6ff;
        color: var(--primary);
    }

    .btn-edit:hover {
        background-color: #dbeafe;
    }

    .btn-delete {
        background-color: #fff1f2;
        color: var(--danger);
    }

    .btn-delete:hover {
        background-color: #ffe4e6;
    }

    .td-desc {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: var(--text-light);
    }
</style>
