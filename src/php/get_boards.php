<!DOCTYPE html>

<?php
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

$sql = "SELECT * from boards";
// Execute the SQL query
$result = $conn->query($sql);

// Process the result set
if ($result->num_rows > 0) {
  // Output data of each row
  while ($row = $result->fetch_assoc()) {
     echo "<div class='card' id={$row['id']} style='width: 18rem;' >
     <div class='card-body'>
     <h5 class='card-title'> {$row['name']} </h5>
     <h6 class='card-subtitle mb-2 text-muted'>Creation date: {$row['creationDate']}</h6>
     <a href=board.php?id={$row['id']} class='btn btn-primary stretched-link'>Open board</a>
     </div>
     </div>";
  }
    //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["creationDate"]. "<br>";
} else {
  echo '<h2>No boards are available in the database.</h2>';
  //echo "0 results";
}

$conn->close();
?>