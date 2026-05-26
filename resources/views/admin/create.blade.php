<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
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
        .container { padding: 30px; max-width: 560px; margin: 0 auto; }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            padding: 30px;
        }
        .card h3 { font-size: 16px; font-weight: 600; color: #1a202c; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid #f0f0f0; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 13px; font-weight: 500; color: #4a5568; margin-bottom: 6px; }
        .form-group input,
        .form-group select {
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
        .form-group input:focus,
        .form-group select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.15);
        }
        .error-text { color: #c53030; font-size: 12px; margin-top: 4px; }
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
        <h2>➕ Nuevo Usuario</h2>
        <a href="{{ route('admin.index') }}">← Volver al panel</a>
    </div>

    <div class="container">
        <div class="card">
            <h3>Completar información del usuario</h3>
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="form-group">
                    <label>Nombre completo</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Ej: Juan Perez" required>
                    @error('name') <p class="error-text">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label>Nombre de usuario</label>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Ej: juanp" required>
                    @error('username') <p class="error-text">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" placeholder="Mínimo 6 caracteres" required>
                    @error('password') <p class="error-text">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label>Rol</label>
                    <select name="rol" required>
                        <option value="">Seleccionar rol</option>
                        <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="usuario" {{ old('rol') == 'usuario' ? 'selected' : '' }}>Usuario</option>
                    </select>
                    @error('rol') <p class="error-text">{{ $message }}</p> @enderror
                </div>
                <div class="actions">
                    <button type="submit" class="btn-guardar">Guardar usuario</button>
                    <a href="{{ route('admin.index') }}" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>