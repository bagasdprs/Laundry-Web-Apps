<?php
$query = mysqli_query($connect, "SELECT * FROM levels ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connect, "DELETE FROM levels WHERE id='$id'");
    if ($delete) {
        header("location: ?page=level&remove=success");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Form level</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mt-3 mb-3">
                    <a href="?page=add-level" class="btn btn-primary">Create New Data Level</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Level Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['level_name'] ?></td>
                                <td>
                                    <a href="?page=add-level&edit=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=level&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>