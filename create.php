<?php
require_once 'user.php';
require_once 'news.php';
$data = $_POST;
$user = new user();
$news = new news();
if (isset($data['action']) && $data['action'] === 'create') {
    $success = $user->store($data);
    if ($success === 'Success') {
        header('Location: index.php');
    } else {
        echo "<script>alert('User not updated');</script>";
        header("Location: index.php");
    }
}
$create = $news->create(['title', 'content', 'image', 'created_at', 'updated_at'], ['title', 'content', 'image', 'created_at', 'updated_at']);


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
        <div class="col-md-12 m-5">
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="firstname" id="form6Example1" class="form-control"/>
                            <label class="form-label" for="form6Example1">First name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="lastname" id="form6Example2" class="form-control"/>
                            <label class="form-label" for="form6Example2">Last name</label>
                        </div>
                    </div>
                </div>


                <!-- Text input -->


                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form6Example5" name="email" class="form-control"/>
                    <label class="form-label" for="form6Example5">Email</label>
                </div>

                <!-- Number input -->
                <div class="form-outline mb-4">
                    <input type="number" id="form6Example6" name="phone" class="form-control"/>
                    <label class="form-label" for="form6Example6">Phone</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="file" id="form6Example6" name="image" class="form-control"/>
                    <label class="form-label" for="form6Example6">Image Upload</label>
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <textarea class="form-control" id="form6Example7" name="about" rows="4"></textarea>
                    <label class="form-label" for="form6Example7">Additional information</label>
                </div>

                <!-- Checkbox -->
                <div class="form-outline mb-4">
                    <input type="hidden" id="form6Example5" name="action" class="form-control" value="create"/>
                </div>


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>