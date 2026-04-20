<?php
$servername = "db";
$username = "user";
$password = "123456";
$dbname = "db_kanban";

$board_id = $_GET["id"];

$table = "<body>
  <!-- Main Board Structure -->
  <main class='board-container'>
    <div class='container-fluid p-3'>
      <div class='row p-3'>";

$table .= getRowTasks('new', $board_id);
$table .= getRowTasks('wip', $board_id);
$table .= getRowTasks('on_hold', $board_id);
$table .= getRowTasks('completed', $board_id);
$table .= getRowTasks('cancelled', $board_id);

$table .= "</div>
  </main>
  <script type='text/javascript' src='../js/move_element.js'></script>
</body>";

echo $table;

function getRowTasks($type, $board_id)
{

  $template = "<!-- Column Template -->
      <div class='col p-3 border border-secondary rounded' data-status='$type'>
        <div class='column-header'>
          <h2 class='column-title'>" . ucfirst(str_replace('_', ' ', $type)) . "</h2>
        </div>
        <div class='tasks-container' id='todoTasks'>";

  $servername = "db";
  $username = "user";
  $password = "123456";
  $dbname = "db_kanban";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * from tasks WHERE status='" . $type . "' AND board_id=" . $board_id . ";";

  // Execute the SQL query
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    $template .= "<div class='card' draggable='true' id='task-{$row['id']}'>
            <div class='card-body' draggable='false'>
              <h5 class='card-title'>{$row['name']}</h5>
              <p class='card-text'>{$row['description']}</p>
            </div>
          </div>";
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["description"]. "<br>";
  }

  $template .= "</div>
      </div>";

  $conn->close();

  return $template;

}

?>