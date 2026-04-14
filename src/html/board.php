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

<!--<body>
  <main class="board-container">
    <div class="container-fluid p-3">
      <div class="row p-3">
      <div class="col p-3" data-status="todo">
        <div class="column-header">
          <h2 class="column-title">To Do</h2>
        </div>
        <div class="tasks-container" id="todoTasks">
          <div class="card" draggable="true" id="task-1">
            <div class="card-body" draggable="false">
              <h5 class="card-title">Tarea 1</h5>
              <p class="card-text">Nueva tarea hecha</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col p-3" data-status="wip">
        <div class="column-header">
          <h2 class="column-title">WIP</h2>
        </div>
        <div class="tasks-container" id="wipTasks"></div>
      </div>
      <div class="col p-3" data-status="done">
        <div class="column-header">
          <h2 class="column-title">Done</h2>
        </div>
        <div class="tasks-container" id="doneTasks"></div>
      </div>
      </div>
    </div>
  </main>
  <script type="text/javascript" src="/js/move_element.js"></script>
</body>-->

<?php include '../php/get_tasks.php'?>

</html>