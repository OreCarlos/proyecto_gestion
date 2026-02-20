<x-app-layout>
    <h2>Usuarios</h2>

    {{-- Solo los admins pueden ver el formulario de crear usuario --}}
    @if (auth()->user()->role === 'admin')
        <button onclick="window.location='{{ route('users.create') }}'">Crear Usuario</button>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        {{-- Solo admin puede editar o eliminar --}}
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('users.edit', $user) }}">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
