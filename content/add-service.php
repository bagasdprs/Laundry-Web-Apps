<?php
if (isset($_POST['save'])) {
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_desc = $_POST['service_desc'];

    $insert = mysqli_query($connect, "INSERT INTO services (service_name, service_price, service_desc) VALUES ('$service_name', '$service_price', '$service_desc')");
    if ($insert) {
        header("location: ?page=service&add=success");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price'];
    $service_desc = $_POST['service_desc'];

    $update = mysqli_query($connect, "UPDATE services SET service_name= '$service_name', service_price='$service_price', service_desc='$service_desc' WHERE id = '$id'");
    if ($update) {
        header("location: ?page=service&update=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connect, "SELECT * FROM services WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?= isset($_GET['edit']) ? 'edit' : 'Create New' ?> Service</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Service Name</label>
                        <input type="text" class="form-control" name="service_name" required placeholder="Enter Service" value="<?= isset($_GET['edit']) ? $rowEdit['service_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Price </label>
                        <input type="number" class="form-control" name="service_price" required placeholder="Enter Price" value="<?= isset($_GET['edit']) ? $rowEdit['service_price'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Desc</label>
                        <input type="text" class="form-control" name="service_desc" required placeholder="Enter Desc " value="<?= isset($_GET['edit']) ? $rowEdit['service_desc'] : '' ?>">
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
            </div>
        </div>
    </div>
</div>