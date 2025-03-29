<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Parque Acuático</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Animate.css para animaciones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      background: linear-gradient(135deg, #a6c0fe, #f68084);
      color: #333;
    }
    /* Estilos para la cabecera */
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-size: 1.8rem;
      font-weight: bold;
    }
    /* Estilos para el contenido */
    .container {
      background: #fff;
      border-radius: 8px;
      padding: 30px;
      margin-top: 30px;
      box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    }
    h1, h2, h3 {
      font-weight: 700;
    }
    ul {
      list-style: none;
      padding-left: 0;
    }
    ul li::before {
      content: "\f111";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      margin-right: 8px;
      color: #007bff;
    }
    /* Estilos para el formulario */
    form .form-group label {
      font-weight: 600;
    }
    #total {
      font-size: 1.5rem;
      margin-top: 20px;
      color: #28a745;
    }
    /* Animaciones al cargar */
    .animate-fadeIn {
      animation: fadeIn 1s;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    /* Pie de página */
    footer {
      background: #f8f9fa;
      padding: 15px 0;
      margin-top: 30px;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>
  <!-- Menú de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary animate__animated animate__fadeInDown">
    <a class="navbar-brand" href="#"><i class="fas fa-water"></i> Parque Acuático</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="admin_login.php" class="nav-link"><i class="fas fa-user-shield"></i> Admin</a></li>
      </ul>
    </div>
  </nav>

  <!-- Contenido principal -->
  <div class="container animate__animated animate__fadeInUp">
    <h1 class="mb-4 text-center">Bienvenidos al Parque Acuático</h1>
    <p class="lead text-center">¡Disfruta de nuestras increíbles instalaciones!</p>
    <div class="row">
      <div class="col-md-6">
        <h2><i class="fas fa-swimmer"></i> Instalaciones</h2>
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
      </div>
      <div class="col-md-6">
        <h2><i class="fas fa-tags"></i> Costos</h2>
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
      </div>
    </div>

    <!-- Formulario de Compra -->
    <h2 class="mt-5"><i class="fas fa-shopping-cart"></i> Realizar Compra</h2>
    <form action="purchase.php" method="POST" id="purchaseForm">
      <div class="form-group">
        <label for="nombre">Nombre Completo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
      </div>
      <div class="form-group">
        <label for="entradas_adulto">Entradas Adulto (precio $180 c/u)</label>
        <input type="number" class="form-control calc" id="entradas_adulto" name="entradas_adulto" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="entradas_nino">Entradas Niño (precio $120 c/u)</label>
        <input type="number" class="form-control calc" id="entradas_nino" name="entradas_nino" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="sillas">Sillas (precio $30 c/u)</label>
        <input type="number" class="form-control calc" id="sillas" name="sillas" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="mesas">Mesas (precio $50 c/u)</label>
        <input type="number" class="form-control calc" id="mesas" name="mesas" min="0" value="0">
      </div>
      <div class="form-group">
        <label for="sombrillas">Sombrillas (precio $50 c/u)</label>
        <input type="number" class="form-control calc" id="sombrillas" name="sombrillas" min="0" value="0">
      </div>
      <!-- Sección para mostrar el total dinámicamente -->
      <div class="alert alert-success text-center" id="total">Total: $0</div>
      <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Comprar</button>
    </form>
  </div>

  <!-- Pie de página -->
  <footer class="text-center">
    <div class="container">
      <p class="mb-0">&copy; 2025 Parque Acuático | Todos los derechos reservados</p>
    </div>
  </footer>

  <!-- Scripts de Bootstrap y dependencias -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Script para actualizar el total dinámicamente -->
  <script>
    // Definir precios por unidad
    const precios = {
      entradas_adulto: 180,
      entradas_nino: 120,
      sillas: 30,
      mesas: 50,
      sombrillas: 50
    };

    // Función para calcular y actualizar el total
    function actualizarTotal() {
      let total = 0;
      for (let campo in precios) {
        const valor = parseInt(document.getElementById(campo).value) || 0;
        total += valor * precios[campo];
      }
      document.getElementById('total').innerText = 'Total: $' + total;
    }

    // Escuchar cambios en todos los inputs con la clase "calc"
    const inputs = document.querySelectorAll('.calc');
    inputs.forEach(input => {
      input.addEventListener('input', actualizarTotal);
    });

    // Inicializar el total al cargar la página
    actualizarTotal();
  </script>
</body>
</html>
