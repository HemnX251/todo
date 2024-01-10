<?php
require "./config.php";
include "../utils/header.php";
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
            ?>
            <tr>
                <td>
                    <?= $row["people_id"] ?>
                </td>
                <td>
                    <?= $row["name"] ?>
                </td>
                <td>
                    <?= $row["email"] ?>
                </td>
                <td>
                    <?= $row["phone"] ?>
                </td>
                <td>
                    <?= $row["address"] ?>
                </td>
                <td>
                    <?= $row["created_at"] ?>
                </td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/todo/edit.php?id=<?= $row["id"] ?>'>Edit</a>
                    <a class=' btn btn-danger btn-sm' href='/todo/delete.php?id=<?= $row["id"] ?>' ]>Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<?php
include "../utils/header.php";
?>