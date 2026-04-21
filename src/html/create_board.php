<?php

header('Content-Type: application/json');

$aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}

if (!isset($_POST['arguments'])) {
    $aResult['error'] = 'No function arguments!';
}

if (!isset($aResult['error'])) {

    switch ($_POST['functionname']) {
        case 'createBoard':
            if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 1)) {
                $aResult['error'] = 'Error in arguments!';
            } else {
                $aResult = changeCard($_POST['arguments'][0], $_POST['arguments'][1], $_POST['arguments'][2]);
            }
            break;

        default:
            $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
            break;
    }

}

echo json_encode($aResult);

function createBoard($board_name)
{

    $result = "";

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

    $sql = "INSERT INTO boards WHERE name=" . $board_name . ";";
    // Execute the SQL query
//$result = $conn->query($sql);

    $result = $sql;

    echo $result;

}

?>