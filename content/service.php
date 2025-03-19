<?php
$query = mysqli_query($connect, "SELECT * FROM services ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connect, "DELETE FROM services WHERE id='$id'");
    if ($delete) {
        header("location: ?page=services&remove=success");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Service</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mt-3 mb-3">
                    <a href="?page=add-service" class="btn btn-primary">Create New Service</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Service Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['service_name'] ?></td>
                                <td><?= $row['service_price'] ?></td>
                                <td><?= $row['service_desc'] ?></td>
                                <td>
                                    <a href="?page=add-service&edit=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=service&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>