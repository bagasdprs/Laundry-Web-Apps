<?php

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connect, "SELECT * FROM trans_order WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['save'])) {
    $id_level = $_POST['id_level'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert = mysqli_query($connect, "INSERT INTO users (id_level, name, email, passwod) VALUES ('$id_level', '$name', '$email' , '$password')");

    if ($insert) {
        header("location: ?page=user&add=success");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $id_level = $_POST['id_level'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($_POST['password']) {
        $password = sha1($_POST['password']);
    } else {
        $password = $password['password'];
    }

    $update = mysqli_query($connect, "UPDATE users SET id_level='$id_level', name='$name', email='$email', password='$password' WHERE id='$id'");
    if ($update) {
        header("location: ?page=user&update=success");
    }
}

$queryCat = mysqli_query($connect, "SELECT * FROM levels");
$rowCat = mysqli_fetch_all($queryCat, MYSQLI_ASSOC);


?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?= isset($_GET['edit']) ? 'Edit' : 'Create New' ?> Trans Order</h3>
            </div>
            <div class="card-body mt-3">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="">Transaction Code</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="trans-code" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="">Order Date</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="order_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="">Customer Name</label>
                                </div>
                                <div class="col-sm-5">
                                    <select name="id_customer" id="" class="form-control">
                                        <option value="">Choose Customer</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="">Pickup date</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="order_end_date" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-12">
                                <div align="right" class="mb-3">
                                    <button type="button" class="btn btn-success btn-sm add-row">Add Row</button>
                                </div>
                                <table class="table table-bordered table-order text-center">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Quantity</th>
                                            <th>Notes</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>