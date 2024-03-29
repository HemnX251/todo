<?php
include "../utils/config.php";
include "../utils/header.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($id)) {
    $fetchQuery = "SELECT * FROM people WHERE id = '$id'";
    $result = $connection->query($fetchQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
    } else {
        $errorMessage = "Record not found.";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];


    $updateQuery = "UPDATE people SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    $updateResult = $connection->query($updateQuery);

    if (!$updateResult) {
        $errorMessage = "Invalid Query: " . $connection->error;
    } else {

        header("Location: /todo/index.php");
        exit();
    }
}
?>


<div class="container my-5">
    <h2>Edit Client</h2>

    <?php
    if (!empty($errorMessage)) {
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    ?>

    <form method="post">
        <input type="hidden" value="<?php echo $id ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="Email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php
include "../utils/footer.php";
?>