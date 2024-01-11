<?php
require "./config.php";

$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "INSERT INTO people (name, email, phone, address)" .
            "VALUES ('$name', '$email', '$phone', '$address')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invaled Query: " . $connection->error;
        } else {
            redirect("/people/index.php");
        }
    }
}

?>
<?php
include "../utils/header.php";
?>

<div class="container my-5">

    <h2>New Client</h2>


    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?= $name; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="Email" class="form-control" name="email" value="<?= $email; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?= $phone; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?= $address; ?>">
            </div>
        </div>


        <?php

        if (!empty($errorMessage)) {

            ?>
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>
                            <?= $errorMessage ?>
                        </strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>


        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="col-sm-3d-grid">
                <a class="btn btn-outline-primary" href="/todo/index.php" role="button">Cancel</a>
            </div>
        </div>

        <?php
        include "../utils/footer.php";
        ?>