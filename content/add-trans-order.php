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

$queryCustomers = mysqli_query($connect, "SELECT * FROM customers ORDER BY id DESC");
$rowCustomers = mysqli_fetch_all($queryCustomers, MYSQLI_ASSOC);

$queryServices = mysqli_query($connect, "SELECT * FROM services ORDER BY id DESC");
$rowServices = mysqli_fetch_all($queryServices, MYSQLI_ASSOC);

// TR (Transaksi)
// TR032125L001
$queryTrans = mysqli_query($connect, "SELECT max(id) as id_trans FROM trans_order");
$rowTrans = mysqli_fetch_assoc($queryTrans);
$id_trans = $rowTrans['id_trans'];
$id_trans++;

$trans_code = "TRL" . date('mdy') . sprintf("%03s", $id_trans);


?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?= isset($_GET['edit']) ? 'Edit' : 'Create New' ?> TransOrder</h3>
            </div>
            <div class="card-body mt-3">
                <form action="" method="post">
                    <input type="hidden" id="service_price">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="">Transaction Code</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="trans-code" readonly value="<?= $trans_code ?>">
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
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="">Service</label>
                                </div>
                                <div class="col-sm-5">
                                    <select name="" id="id_service" class="form-control">
                                        <option value="">Choose Services</option>
                                        <?php foreach ($rowServices as $rowService) : ?>
                                            <option value="<?= $rowService['id'] ?>"><?= $rowService['service_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
                                        <?php foreach ($rowCustomers as $rowCustomer) : ?>
                                            <option value="<?= $rowCustomer['id'] ?>"><?= $rowCustomer['cust_name'] ?></option>
                                        <?php endforeach; ?>
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
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Notes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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