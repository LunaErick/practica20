<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
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
        .navbar a { color: #a0aec0; text-decoration: none; font-size: 13px; transition: color 0.2s; }
        .navbar a:hover { color: white; }
        .container { padding: 30px; max-width: 520px; margin: 0 auto; }
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 20px 30px;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .avatar {
            width: 46px; height: 46px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            color: white;
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255,255,255,0.4);
        }
        .card-header h3 { color: white; font-size: 16px; font-weight: 600; }
        .card-header span { color: rgba(255,255,255,0.7); font-size: 12px; }
        .card-body { padding: 28px 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 13px; font-weight: 500; color: #4a5568; margin-bottom: 6px; }
        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            outline: none;
            color: #2d3748;
            transition: border 0.2s, box-shadow 0.2s;
        }
        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.15);
        }
        .form-group small { color: #a0aec0; font-size: 12px; margin-top: 4px; display: block; }
        .error-text { color: #c53030; font-size: 12px; margin-top: 4px; }
        .divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 22px 0;
        }
        .section-label {
            font-size: 12px;
            font-weight: 600;
            color: #a0aec0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }
        .actions { display: flex; gap: 10px; margin-top: 24px; }
        .btn-guardar {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 10px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-guardar:hover { opacity: 0.9; }
        .btn-cancelar {
            background: #f7f8fc;
            color: #4a5568;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            border: 1.5px solid #e2e8f0;
            transition: background 0.2s;
        }
        .btn-cancelar:hover { background: #edf2f7; }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>✏️ Editar Perfil</h2>
        <a href="{{ route('usuario.perfil') }}">← Volver</a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div>
                    <h3>{{ auth()->user()->name }}</h3>
                    <span>{{ auth()->user()->username }}</span>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('perfil.update') }}">
                    @csrf
                    @method('PUT')

                    <p class="section-label">Información personal</p>

                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                        @error('name') <p class="error-text">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Nombre de usuario</label>
                        <input type="text" name="username" value="{{ old('username', auth()->user()->username) }}" required>
                        @error('username') <p class="error-text">{{ $message }}</p> @enderror
                    </div>

                    <hr class="divider">
                    <p class="section-label">Cambiar contraseña</p>

                    <div class="form-group">
                        <label>Nueva contraseña</label>
                        <input type="password" name="password" placeholder="Dejar vacío para no cambiar">
                        <small>Mínimo 6 caracteres.</small>
                    </div>
                    <div class="form-group">
                        <label>Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" placeholder="Repite la nueva contraseña">
                        @error('password') <p class="error-text">{{ $message }}</p> @enderror
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn-guardar">Guardar cambios</button>
                        <a href="{{ route('usuario.perfil') }}" class="btn-cancelar">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>