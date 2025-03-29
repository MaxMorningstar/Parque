<?php
session_start();
if(isset($_SESSION['admin'])) {
    header("Location: admin_panel.php");
    exit();
}

$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Se usa MD5 para este ejemplo (en producción, usar password_hash)
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $pass_md5 = md5($password);
    $stmt->bind_param("ss", $username, $pass_md5);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $_SESSION['admin'] = $username;
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Admin Login</h2>
    <?php if($error) { echo '<div class="alert alert-danger">'.$error.'</div>'; } ?>
    <form method="POST">
      <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" name="username" id="username" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
  </div>
</body>
</html>
