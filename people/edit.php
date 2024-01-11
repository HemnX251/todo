<?php

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
}
?>
<?php
include "../utils/config.php";
include "../utils/header.php";
?>

<body>


    <div class="container my-5">

        <h2>New Client</h2>

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


            <?php

            if (!empty($successMessage)) {

                echo "
<div class='row mb-3'>
<div class='offset-sm-3 col-sm-6'>
<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMessage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
</div>
</div>

";
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