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
        case 'changeCardState':
            if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 3)) {
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

function changeCard($board_id, $card_id, $state)
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

    $sql = "UPDATE tasks SET status = '$state' WHERE id = $card_id AND board_id = $board_id ;";
    // Execute the SQL query
    $result = $conn->query($sql);

    return $result;

}

?>