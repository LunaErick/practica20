<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
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
        .navbar h2 { color: white; font-size: 16px; font-weight: 600; }
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
        .container { padding: 40px 20px; max-width: 480px; margin: 0 auto; }
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 30px;
            text-align: center;
        }
        .avatar {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            color: white;
            font-size: 28px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            border: 3px solid rgba(255,255,255,0.4);
        }
        .card-header h3 { color: white; font-size: 20px; font-weight: 600; margin-bottom: 6px; }
        .badge-rol {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .card-body { padding: 24px; }
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid #f7f8fc;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-size: 13px; color: #a0aec0; font-weight: 500; }
        .info-value { font-size: 14px; color: #2d3748; font-weight: 500; }
        .btn-editar {
            display: block;
            margin: 20px 24px 24px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            transition: opacity 0.2s;
        }
        .btn-editar:hover { opacity: 0.9; }
        .alert-success {
            background: #f0fff4;
            border: 1px solid #c6f6d5;
            color: #276749;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Mi Perfil</h2>
        <a href="{{ route('logout') }}" class="btn-logout">Cerrar Sesión</a>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <h3>{{ auth()->user()->name }}</h3>
                <span class="badge-rol">{{ ucfirst(auth()->user()->rol) }}</span>
            </div>

            <div class="card-body">
                <div class="info-row">
                    <span class="info-label">Usuario</span>
                    <span class="info-value">{{ auth()->user()->username }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Nombre</span>
                    <span class="info-value">{{ auth()->user()->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Rol</span>
                    <span class="info-value">{{ ucfirst(auth()->user()->rol) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Miembro desde</span>
                    <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                </div>
            </div>

            <a href="{{ route('perfil.edit') }}" class="btn-editar">✏️ Editar perfil</a>
        </div>
    </div>
</body>
</html>