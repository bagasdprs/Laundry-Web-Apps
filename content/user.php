<?php
// $query = mysqli_query($connect, "SELECT * FROM users ORDER BY id DESC");
$query = mysqli_query($connect, "SELECT users.*, levels.level_name FROM users LEFT JOIN levels ON users.id_level = levels.id");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connect, "DELETE FROM users WHERE id='$id'");
    if ($delete) {
        header("location: ?page=user&remove=success");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>Form Users</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mt-3 mb-3">
                    <a href="?page=add-user" class="btn btn-primary">Create New User</a>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['level_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                    <a href="?page=add-user&edit=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=user&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>