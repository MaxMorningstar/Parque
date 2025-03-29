<?php
session_start();

// Si ya existe sesión iniciada, redirige según el tipo de usuario
if(isset($_SESSION['id'])) {
    if($_SESSION['tipo_usuario'] == 'admin'){
         header("Location: admin_panel.php");
    } else {
         header("Location: index.php");
    }
    exit();
}

$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'db.php'; // Archivo de conexión a la base de datos

    $correo = $_POST['correo'];
    $password = $_POST['password'];
    
    // Se usa MD5 para este ejemplo (en producción, usar password_hash y password_verify)
    $pass_md5 = md5($password);
    
    $stmt = $conn->prepare("SELECT id, nombre, tipo_usuario FROM usuarios WHERE correo = ? AND password = ?");
    $stmt->bind_param("ss", $correo, $pass_md5);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        // Guardamos la sesión con los datos del usuario
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
        
        // Redirección según tipo de usuario
        if($row['tipo_usuario'] == 'admin'){
            header("Location: admin_panel.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Parque Acuático</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Animate.css para animaciones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      background: linear-gradient(135deg, #a6c0fe, #f68084);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
    }
    .login-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-container h2 {
      font-weight: 700;
      margin-bottom: 20px;
      text-align: center;
    }
    .form-group label {
      font-weight: 600;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .logo {
      font-size: 3rem;
      color: #007bff;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="login-container animate__animated animate__fadeInDown">
    <div class="logo">
      <i class="fas fa-water"></i>
    </div>
    <h2>Iniciar Sesión</h2>
    <?php if($error) { echo '<div class="alert alert-danger">'.$error.'</div>'; } ?>
    <form method="POST">
      <div class="form-group">
        <label for="correo"><i class="fas fa-envelope"></i> Correo</label>
        <input type="email" class="form-control" name="correo" id="correo" placeholder="ejemplo@dominio.com" required>
      </div>
      <div class="form-group">
        <label for="password"><i class="fas fa-lock"></i> Contraseña</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
    </form>
  </div>

  <!-- Scripts de Bootstrap y dependencias -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
