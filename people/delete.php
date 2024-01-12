<?php


require "../utils/config.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";

if (!empty($id)) {
    
    $deleteQuery = "DELETE FROM people WHERE id = '$id'";
    $deleteResult = $connection->query($deleteQuery);

    if (!$deleteResult) {
        echo "Error deleting record: " . $connection->error;
    }
}


header("Location: /todo/index.php");
exit();
?>
