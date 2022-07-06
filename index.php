<?php
include_once './user.php';
$UserController = new user();
$users = $UserController->list();
$id = $_GET['id'] ?? 0;
$action = $_GET['action'] ?? null;

if (isset($action) && $action === 'delete') {
    $success = $UserController->destroy($id);
    if ($success === 'Success') {
        header('Location: index.php');
    } else {
        echo "<script>alert('User not deleted');</script>";
        header("Location: index.php");
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class=""><a href="create.php" class="btn btn-secondary">Create</a></div>
        <div class="col-md-12 m-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">firstname</th>
                    <th scope="col">lastname</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key=>$user){ ?>
                    <tr>
                        <th scope="row"><?= ++$key ?></th>
                        <td><?= $user->firstname ?></td>
                        <td><?= $user->lastname ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->phone ?></td>
                        <td>
                            <a href="show.php?id=<?= $user->id ?>" class="btn btn-success">show</a>
                            <a href="edit.php?id=<?= $user->id ?>" class="btn btn-primary">Edit</a>
                            <a href="index.php?id=<?= $user->id ?>&action=delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

    </div>
</div>

</body>
</html>