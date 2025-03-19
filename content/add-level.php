<?php
if (isset($_POST['save'])) {
    $level_name = $_POST['level_name'];


    $insert = mysqli_query($connect, "INSERT INTO levels (level_name) VALUES ('$level_name')");
    if ($insert) {
        header("location:?page=level&add=success");
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $level_name = $_POST['level_name'];

    $update = mysqli_query($connect, "UPDATE levels SET level_name= '$level_name' WHERE id = '$id'");
    if ($update) {
        header("location: ?page=service&level=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connect, "SELECT * FROM levels WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3><?= isset($_GET['edit']) ? 'edit' : 'Create New' ?> Level</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Level Name</label>
                        <input type="text" class="form-control" name="level_name" required placeholder="Enter Level" value="<?= isset($_GET['edit']) ? $rowEdit['level_name'] : '' ?>">
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
            </div>
        </div>
    </div>
</div>