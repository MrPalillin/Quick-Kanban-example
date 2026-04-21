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
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <div id="modal-container"></div>
  <div class="container-fluid">
    <div class="row p-2">
      <div class="col p-2">
        <title>Página de gestión de tareas personal</title>
      </div>
    </div>
    <div class="row p-2">
      <div class="col p-2">
        <h3>Seleccione uno de los siguientes tableros</h3>
      </div>
      <div class="col p-2">
        <button class="btn btn-primary" onclick="openModal()">Create new board</button>
      </div>
    </div>
    <div class="row p-2">
      <div class="col p-2">
        <?php include("../php/get_boards.php"); ?>
      </div>
    </div>
  </div>
  <script>
    function openModal() {
      fetch('create_board_modal.php')
        .then(response => response.text())
        .then(html => {
          document.getElementById('modal-container').innerHTML = html;

          // Now show it (depends on your modal system)
          document.getElementById('myModal').style.display = 'block';
        })
        .catch(err => console.error(err));
    }

    document.addEventListener('click', function (e) {
      if (e.target.classList.contains('btn-close') || e.target.id == "btn-close") {
        document.getElementById('myModal').style.display = 'none';
      }
    });
  </script>
</body>

</html>