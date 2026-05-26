<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 28px;
        }
        .logo h1 {
            color: white;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }
        .logo p {
            color: #a0aec0;
            font-size: 13px;
            margin-top: 4px;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 36px 32px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .card h2 {
            font-size: 20px;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 4px;
        }
        .card .subtitle {
            font-size: 13px;
            color: #718096;
            margin-bottom: 28px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 6px;
        }
        .input-wrap { position: relative; }
        .input-wrap span {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 16px;
        }
        .form-group input {
            width: 100%;
            padding: 11px 14px 11px 38px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border 0.2s, box-shadow 0.2s;
            color: #2d3748;
        }
        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.15);
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            margin-top: 8px;
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn:hover { opacity: 0.92; }
        .btn:active { transform: scale(0.99); }
        .error {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            color: #c53030;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 18px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #a0aec0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <h1>Sistema de Gestión</h1>
            <p>Erick Ivan Luna Tarqui</p>
        </div>

        <div class="card">
            <h2>Bienvenido</h2>
            <p class="subtitle">Ingresa tus credenciales para continuar</p>

            @if ($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label>Usuario</label>
                    <div class="input-wrap">
                        <span>👤</span>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Ingresa tu usuario" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <div class="input-wrap">
                        <span>🔒</span>
                        <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
        </div>

        <div class="footer">Práctica N°20 — Framework + Sesiones</div>
    </div>
</body>
</html>