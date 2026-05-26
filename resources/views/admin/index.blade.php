<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f7f8fc; }
        .navbar {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 0 30px;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .navbar-left { display: flex; align-items: center; gap: 12px; }
        .navbar-left .icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
        }
        .navbar-left h2 { color: white; font-size: 16px; font-weight: 600; }
        .navbar-left span { color: #a0aec0; font-size: 12px; display: block; }
        .navbar-right { display: flex; align-items: center; gap: 16px; }
        .user-badge {
            background: rgba(255,255,255,0.1);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
        }
        .btn-logout {
            color: #fc8181;
            text-decoration: none;
            font-size: 13px;
            padding: 6px 14px;
            border: 1px solid rgba(252,129,129,0.3);
            border-radius: 20px;
            transition: all 0.2s;
        }
        .btn-logout:hover { background: rgba(252,129,129,0.1); }
        .container { padding: 30px; max-width: 1000px; margin: 0 auto; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            border-left: 4px solid;
        }
        .stat-card.total { border-color: #667eea; }
        .stat-card.admins { border-color: #9f7aea; }
        .stat-card.usuarios { border-color: #4299e1; }
        .stat-card .num { font-size: 28px; font-weight: 600; color: #1a202c; }
        .stat-card .label { font-size: 12px; color: #718096; margin-top: 2px; }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            overflow: hidden;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #f0f0f0;
        }
        .card-header h3 { font-size: 16px; font-weight: 600; color: #1a202c; }
        .btn-nuevo {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: opacity 0.2s;
        }
        .btn-nuevo:hover { opacity: 0.9; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #f8f9ff; }
        th { padding: 12px 20px; text-align: left; font-size: 12px; font-weight: 600; color: #718096; text-transform: uppercase; letter-spacing: 0.05em; }
        td { padding: 14px 20px; font-size: 14px; color: #2d3748; border-top: 1px solid #f7f8fc; }
        tr:hover td { background: #fafbff; }
        .avatar-sm {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            vertical-align: middle;
        }
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }
        .badge-admin { background: #e9d8fd; color: #6b46c1; }
        .badge-usuario { background: #bee3f8; color: #2b6cb0; }
        .btn-editar {
            background: #fef3c7;
            color: #92400e;
            padding: 5px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            margin-right: 6px;
            transition: background 0.2s;
        }
        .btn-editar:hover { background: #fde68a; }
        .btn-eliminar {
            background: #fee2e2;
            color: #991b1b;
            padding: 5px 12px;
            border-radius: 6px;
            border: none;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-eliminar:hover { background: #fecaca; }
        .alert {
            background: #f0fff4;
            border: 1px solid #c6f6d5;
            color: #276749;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <div class="icon">⚙️</div>
            <div>
                <h2>Panel Administrador</h2>
                <span>Gestión de usuarios</span>
            </div>
        </div>
        <div class="navbar-right">
            <span class="user-badge">👤 {{ auth()->user()->name }}</span>
            <a href="{{ route('logout') }}" class="btn-logout">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert">✅ {{ session('success') }}</div>
        @endif

        <div class="stats">
            <div class="stat-card total">
                <div class="num">{{ $usuarios->count() }}</div>
                <div class="label">Total usuarios</div>
            </div>
            <div class="stat-card admins">
                <div class="num">{{ $usuarios->where('rol','admin')->count() }}</div>
                <div class="label">Administradores</div>
            </div>
            <div class="stat-card usuarios">
                <div class="num">{{ $usuarios->where('rol','usuario')->count() }}</div>
                <div class="label">Usuarios</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Lista de usuarios</h3>
                <a href="{{ route('admin.create') }}" class="btn-nuevo">+ Nuevo usuario</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td style="color:#a0aec0">{{ $loop->iteration }}</td>
                        <td>
                            <span class="avatar-sm">{{ strtoupper(substr($usuario->name, 0, 1)) }}</span>
                            {{ $usuario->name }}
                        </td>
                        <td style="color:#718096">{{ $usuario->username }}</td>
                        <td>
                            <span class="badge {{ $usuario->rol === 'admin' ? 'badge-admin' : 'badge-usuario' }}">
                                {{ ucfirst($usuario->rol) }}
                            </span>
                        </td>
                        <td style="color:#718096; font-size:13px">{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $usuario->id) }}" class="btn-editar">✏️ Editar</a>
                            <form method="POST" action="{{ route('admin.destroy', $usuario->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-eliminar" onclick="return confirm('¿Eliminar a {{ $usuario->name }}?')">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>