<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
       die("Something went wrong");

}


function getData($connection, $table)
{
       $sql = "SELECT * FROM $table";
       $result = $connection->query($sql);

       if (!$result) {
              die("Invalid query:" . $connection->error);
       }

       return $result;
}

function redirect($path)
{
       header("Location: " . $path);
}
?>