<?php
$queryCustomer = mysqli_query($connect, "SELECT * FROM customers ORDER BY id DESC");
$rowCustomer = mysqli_fetch_all($queryCustomer, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connect, "DELETE FROM customers WHERE id='$id'");
    if ($delete) {
        header("location: ?page=customer&remove=success");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Customer</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mt-3 mb-3">
                    <a href="?page=add-customer" class="btn btn-primary">Create New Customer</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rowCustomer as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['cust_name'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td>
                                    <a href="?page=add-customer&edit=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=customer&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>