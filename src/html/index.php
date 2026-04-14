<!DOCTYPE html>
<html>

<head>
  <title>Tablero de gestión de tareas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <title>Página de gestión de tareas personal</title>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h3>Seleccione uno de los siguientes tableros</h3>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php include("../php/get_boards.php"); ?>
      </div>
    </div>
  </div>
</body>

</html>