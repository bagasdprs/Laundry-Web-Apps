<?php
$query = mysqli_query($connect, "SELECT trans_order.*, customers.cust_name FROM trans_order LEFT JOIN customers ON customers.id = trans_order.id 
WHERE deleted_at = 0 ORDER BY trans_order.id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connect, "UPDATE FROM trans_order SET deleted_at = 1 WHERE id='$id'");
    if ($delete) {
        header("location: ?page=trans-order&remove=success");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Form Transaction</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mt-3 mb-3">
                    <a href="?page=add-trans-order" class="btn btn-primary">Create New Order</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['trans_code'] ?></td>
                                <td><?= $row['customer_name'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td>
                                    <a href="?page=add-trans-order&detail=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=trans-order&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>