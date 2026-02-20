<x-app-layout>
    <div class="dashboard-wrapper">
        <div class="card-main">
            <h2 class="dashboard-title">Panel de Control</h2>
            <p class="dashboard-subtitle">Selecciona un módulo para gestionar tu inventario</p>

            <div class="modules-grid">
                <a href="{{ url('/almacenes') }}" class="module-link">
                    <div class="module-card card-almacenes">
                        <div class="module-icon">📦</div>
                        <div class="module-info">
                            <span class="module-name">Almacenes</span>
                            <span class="module-desc">Gestionar sedes y ubicaciones</span>
                        </div>
                    </div>
                </a>

                <a href="{{ url('/productos') }}" class="module-link">
                    <div class="module-card card-productos">
                        <div class="module-icon">🛒</div>
                        <div class="module-info">
                            <span class="module-name">Productos</span>
                            <span class="module-desc">Control de stock y precios</span>
                        </div>
                    </div>
                </a>

                <a href="{{ url('/usuarios') }}" class="module-link">
                    <div class="module-card card-productos">
                        <div class="module-icon">🛒</div>
                        <div class="module-info">
                            <span class="module-name">Uusuario</span>
                            <span class="module-desc">Control de stock y precios</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


</x-app-layout>
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6366f1 0%, #4338ca 100%);
        --secondary-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --bg-light: #f1f5f9;
    }

    .dashboard-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        padding: 20px;
    }

    .card-main {
        background: white;
        padding: 3rem;
        border-radius: 1.5rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        width: 100%;
        text-align: center;
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .dashboard-subtitle {
        color: #64748b;
        margin-bottom: 2.5rem;
    }

    .modules-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .module-link {
        text-decoration: none;
        color: inherit;
    }

    .module-card {
        display: flex;
        align-items: center;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 1rem;
        border: 2px solid transparent;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-align: left;
    }

    .module-icon {
        font-size: 2.5rem;
        margin-right: 1.2rem;
        transition: transform 0.3s ease;
    }

    .module-name {
        display: block;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
    }

    .module-desc {
        font-size: 0.85rem;
        color: #64748b;
    }

    .module-card:hover {
        transform: translateY(-5px);
        background: white;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .card-almacenes:hover {
        border-color: #6366f1;
    }

    .card-productos:hover {
        border-color: #10b981;
    }

    .module-card:hover .module-icon {
        transform: scale(1.2);
    }
</style>
