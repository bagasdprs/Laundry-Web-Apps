<?php

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connect, "SELECT * FROM users WHERE id='$id'");
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
                <h3>Create Users</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">ID Level</label>
                        <select name="id_level" class="form-control">
                            <option value="">Choose Category</option>
                            <?php foreach ($rowCat as $item) : ?>
                                <option <?= isset($_GET['edit']) ? ($rowEdit['id_level'] == $item['id']) ? 'selected' : '' : '' ?>
                                    value="<?= $item['id'] ?>"><?= $item['level_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter Name" value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter Email" value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" value="">
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-primary" type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
            </div>
        </div>
    </div>
</div>