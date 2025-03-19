<?php
if (isset($_POST['save'])) {
    $cust_name = $_POST['cust_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $insert = mysqli_query($connect, "INSERT INTO customers (cust_name, phone, address) VALUES ('$cust_name', '$phone', '$address')");

    if ($insert) {
        header("location: ?page=customer&add=success");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $cust_name = $_POST['cust_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update = mysqli_query($connect, "UPDATE customers SET cust_name='$cust_name', phone='$phone', address='$address' WHERE id='$id'");
    if ($update) {
        header("location: ?page=customer&update=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connect, "SELECT * FROM customers WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Customer</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Customer Name</label>
                        <input type="text" class="form-control" name="cust_name" required placeholder="Enter customer name" value="<?= isset($_GET['edit']) ? $rowEdit['cust_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Customer Phone <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone" required placeholder="Enter customer phone" value="<?= isset($_GET['edit']) ? $rowEdit['cust_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Customer Address</label>
                        <input type="text" class="form-control" name="address" required placeholder="Enter Customer Address " value="<?= isset($_GET['edit']) ? $rowEdit['cust_name'] : '' ?>">
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
            </div>
        </div>
    </div>
</div>