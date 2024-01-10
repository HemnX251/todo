<?php
include "./config.php";
include "./header.php";
?>



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


        $result = getData($connection, "people");

        while ($row = $result->fetch_assoc()) {

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
                <a class='btn btn-danger btn-sm' href='/'>Delete</a>
            </td>
        </tr>
    </tbody>
</table>


<?php
include "./footer.php";
?>