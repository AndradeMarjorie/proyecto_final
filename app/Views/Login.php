<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }


        body::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: linear-gradient(45deg, #a855f7, #6366f1);
            border-radius: 50%;
            top: -150px;
            right: -150px;
            opacity: 0.8;
        }

        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
            opacity: 0.6;
        }

        .login-container {
            display: flex;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            max-width: 900px;
            width: 90%;
            min-height: 500px;
            position: relative;
            z-index: 1;
        }

        .login-left {
            flex: 1;
            padding: 60px 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            font-size: 3rem;
            font-weight: 300;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .login-subtitle {
            font-size: 1.5rem;
            margin-bottom: 30px;
            opacity: 0.8;
        }

        .login-description {
            font-size: 1rem;
            line-height: 1.6;
            opacity: 0.7;
            max-width: 400px;
        }

        .login-form {
            flex: 1;
            background: rgba(0, 0, 0, 0.8);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .form-title {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        .error-message {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid rgba(239, 68, 68, 0.3);
            font-size: 0.9rem;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                margin: 20px;
            }

            .login-left {
                padding: 40px 30px 20px;
                text-align: center;
            }

            .login-title {
                font-size: 2rem;
            }

            .login-subtitle {
                font-size: 1.2rem;
            }

            .login-form {
                padding: 40px 30px;
            }
        }

        /* Animación de entrada */
        .login-container {
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <h1 class="login-title">Sistema de Biblioteca</h1>
            <h2 class="login-subtitle">Gestión de Inventario</h2>
            <p class="login-description">
                Accede al sistema de gestión de inventario de la biblioteca. 
                Administra el catálogo de libros, gestiona préstamos y devoluciones, 
                y controla el acceso según tu rol de usuario de manera segura y eficiente.
            </p>
        </div>
        
        <div class="login-form">
            <h3 class="form-title">Iniciar Sesión</h3>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <form method="post" action="<?= base_url('login/autenticar') ?>">
                <div class="form-group">
                    <input 
                        type="text" 
                        name="usuario" 
                        class="form-input" 
                        placeholder="Usuario" 
                        required
                        autocomplete="username"
                    >
                </div>
                
                <div class="form-group">
                    <input 
                        type="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="Contraseña" 
                        required
                        autocomplete="current-password"
                    >
                </div>
                
                <button type="submit" class="login-btn">
                    Ingresar al Sistema
                </button>
            </form>
        </div>
    </div>
</body>
</html>