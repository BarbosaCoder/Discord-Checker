<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Nitro Suite</title>
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
  <style>
    :root {
      --bg: #1a1a2e;
      --card: #16213e;
      --accent: #7f00ff;
      --text: #fff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 1rem;
      background-image: linear-gradient(45deg, #1a1a2e, #6a11cb);
    }

    .login-card {
      background: var(--card);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.4);
      width: 100%;
      max-width: 400px;
      color: var(--text);
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .login-card h2 {
      text-align: center;
      color: var(--accent);
    }

    .login-card input {
      padding: 12px;
      border: 2px solid var(--accent);
      border-radius: 8px;
      background: rgba(0,0,0,0.2);
      color: white;
      font-size: 1rem;
    }

    .login-card button {
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: var(--accent);
      color: white;
      cursor: pointer;
      font-size: 1rem;
      transition: background 0.3s;
    }

    .login-card button:hover {
      background: #9b00ff;
    }

    .login-card .alert {
      font-size: 0.9rem;
      background: rgba(255, 255, 255, 0.1);
      padding: 0.5rem 1rem;
      border-left: 4px solid var(--accent);
      border-radius: 6px;
    }

    .error-msg {
      background: #ff467e;
      padding: 0.5rem;
      border-radius: 6px;
      text-align: center;
      display: none;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2><i class="mdi mdi-account-circle"></i> Acesso ao DC PREMIUM</h2>

    <div class="alert">
      <strong>Aviso:</strong> Usuário de teste: <code>test</code><br>
      Senha de teste: <code>test</code>
    </div>

    <input type="text" id="username" placeholder="Usuário">
    <input type="password" id="password" placeholder="Senha">
    <div class="error-msg" id="errorMsg">Usuário ou senha incorretos!</div>
    <button onclick="login()">Entrar</button>
     <div class="alert">
    ₢barbosa.dev
</div>
  </div>

  <script>
    function login() {
      const user = document.getElementById('username').value;
      const pass = document.getElementById('password').value;
      const errorMsg = document.getElementById('errorMsg');

      if (user === 'test' && pass === 'test') {
        // Redireciona para a página principal, altere conforme necessário
        window.location.href = 'checker.php';
      } else {
        errorMsg.style.display = 'block';
        setTimeout(() => errorMsg.style.display = 'none', 3000);
      }
    }
  </script>
 

</body>
</html>
