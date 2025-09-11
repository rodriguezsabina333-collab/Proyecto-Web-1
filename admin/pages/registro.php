<?php
session_start();

// Generar token CSRF simple
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Mensajes flash (opcionales)
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; max-width:600px; margin:auto; }
    input { display:block; margin-bottom:10px; padding:8px; width:100%; box-sizing:border-box; }
    .error { color: #b00020; }
    .success { color: #006400; }
  </style>
</head>
<body>
  <h1>Registro de usuario</h1>

  <?php if ($flash): ?>
    <p class="<?= htmlspecialchars($flash['type']) ?>"><?= htmlspecialchars($flash['msg']) ?></p>
  <?php endif; ?>

  <form action="process_register.php" method="post" novalidate>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
    <label>
      Usuario (solo letras, números y guiones bajos):
      <input type="text" name="username" required maxlength="50" pattern="[A-Za-z0-9_]+" title="Solo letras, números y guiones bajos">
    </label>

    <label>
      Correo electrónico:
      <input type="email" name="email" required maxlength="255">
    </label>

    <label>
      Contraseña (mínimo 8 caracteres):
      <input type="password" name="password" required minlength="8">
    </label>

    <label>
      Confirmar contraseña:
      <input type="password" name="password_confirm" required minlength="8">
    </label>

    <button type="submit">Registrar</button>
  </form>
</body>
</html>
