<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Parque Acuático</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Puedes agregar estilos adicionales aquí */
  </style>
</head>
<body>
  <!-- Menú de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Parque Acuático</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="admin_login.php" class="nav-link">Admin</a></li>
      </ul>
    </div>
  </nav>

  <!-- Contenido principal -->
  <div class="container mt-4">
    <h1>Bienvenidos al Parque Acuático</h1>
    <p>Disfruta de nuestras instalaciones:</p>
    <ul>
      <li>Alberca infantil</li>
      <li>Alberca familiar</li>
      <li>Alberca de olas con toboganes</li>
      <li>Lago natural</li>
      <li>Cabañas para 4 personas</li>
      <li>Cabañas para 6 personas</li>
      <li>Áreas de camping</li>
      <li>Estacionamiento</li>
      <li>Servicio médico</li>
      <li>Regaderas</li>
      <li>Seguridad las 24 Hrs.</li>
      <li>Asadores</li>
      <li>Áreas verdes</li>
      <li>Renta de casas de campaña</li>
    </ul>

    <h2>Costos</h2>
    <ul>
      <li>Espacio para casa de campaña por noche: $350</li>
      <li>Renta de casa de campaña para 4 personas: $150</li>
      <li>Renta de casa de campaña para 8 personas: $180</li>
      <li>Renta de casa de campaña para 12 personas: $220</li>
      <li>Cabaña para 4 personas: $2500</li>
      <li>Cabaña para 6 personas: $3000</li>
      <li>Silla: $30</li>
      <li>Mesa: $50</li>
      <li>Sombrilla: $50</li>
      <li>Entrada al parque (Adulto): $180</li>
      <li>Entrada al parque (Niño): $120</li>
    </ul>

    <!-- Formulario de Compra -->
    <h2>Realizar Compra</h2>
    <form action="purchase.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre Completo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="entradas_adulto">Entradas Adulto (precio $180 c/u)</label>
        <input type="number" class="form-control" id="entradas_adulto" name="entradas_adulto" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="entradas_nino">Entradas Niño (precio $120 c/u)</label>
        <input type="number" class="form-control" id="entradas_nino" name="entradas_nino" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="sillas">Sillas (precio $30 c/u)</label>
        <input type="number" class="form-control" id="sillas" name="sillas" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="mesas">Mesas (precio $50 c/u)</label>
        <input type="number" class="form-control" id="mesas" name="mesas" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="sombrillas">Sombrillas (precio $50 c/u)</label>
        <input type="number" class="form-control" id="sombrillas" name="sombrillas" min="0" value="0">
      </div>
      <!-- Puedes agregar más opciones de compra aquí -->
      <button type="submit" class="btn btn-success">Comprar</button>
    </form>
  </div>

  <!-- Pie de página -->
  <footer class="bg-light text-center text-lg-start mt-4">
    <div class="text-center p-3">
      © 2025 Parque Acuático
    </div>
  </footer>

  <!-- Scripts de Bootstrap y dependencias -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
