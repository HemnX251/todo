<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    

<div class="container my-5">
<h2>To Do List</h2>
<a class="btn btn-primary" href="/todo/create.php" role="button">New Client</a>
<br>
</div>

<table class="table">
<thead>
    <TR>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Created At</th>
        <th>Action</th>
    </TR>
</thead>

<tbody>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: ". $connection->connect_error);
} 

$sql = "SELECT * FROM people";
$result = $connection->query($sql); 

if (!$result) {
die("Invalid query:" . $connection->error);
}


while($row = $result->fetch_assoc()){

echo "

<tr>

<td>$row[id]</td>
<td>$row[name]</td>
<td>$row[email]</td>
<td>$row[phone]</td>
<td>$row[address]</td>
<td>$row[created_at]</td>
<td>
<a class='btn btn-primary btn-sm' href='/todo/edit.php?id=$row[id]>Edit</a> 
<a class='btn btn-danger btn-sm' href='/todo/delete.php?id=$row[id]]>Delete</a>
</td>
</tr>

";
}
?>

<tr>
<td>10</td>
<td>Bill Gates</td>
<td>bill.gates@microsoft.com</td>
<td>+111222333</td>
<td>New York, USA</td>
<td>18/05/2022</td>
<td>
<a class="btn btn-primary btn-sm" href='/'>Edit</a> 
<a class='btn btn-danger btn-sm' href='/' >Delete</a>
</td>
</tr>
</tbody>
</table>


</body>
</html>