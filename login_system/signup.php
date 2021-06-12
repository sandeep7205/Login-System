<?php
$alert = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "/xampp/htdocs/sandeep/login_system/other_files/conn.php";
    $name = $_POST["fullname"];
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
    $cpassword = $_POST["confirmPassword"];
    $gender = $_POST["gender"];

    //Check if the email id exist ..
    $exist_sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $exist_result = mysqli_query($conn, $exist_sql);
    $exist_num_row = mysqli_num_rows($exist_result);
    if ($exist_num_row != 0) {
        $showerror = "Email Id already exists";
    } else {
        if ($password == $cpassword) {
            // generate hash password 
            $hash_pswd = password_hash($password, PASSWORD_DEFAULT);
            $sql_insrt = "INSERT INTO `user` (`name`, `email`, `password`, `gender`, `time`) VALUES ('$name', '$email', '$hash_pswd', '$gender', current_timestamp())";
            $insrt_result = mysqli_query($conn, $sql_insrt);
            if ($insrt_result) {
                $alert = true;
                // echo "inserted";
            }
        } else {
            $showerror = "Password does not match";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Sign Up</title>
</head>

<body>
    <?php require 'other_files/nav_bar.php' ?>
    <?php
    if ($alert) {
        echo '<div class="alert alert-success">
    <strong>Success!</strong> Your Entry was successfully added</div>';
    }
    if ($showerror) {
        echo "<div class='alert alert-danger'>
    <strong>Unsuccessful!</strong> $showerror </div>";
    }
    ?>
    <div class="container">
        <h3 class="mx-auto" style="width: 170px; margin-top:10px">Sign Up</h3>
        <form action="/sandeep/login_system/signup.php" method="post">
            <div class=" form-group row mt-3">
                <label for="fullname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group row mt-3 mb-3">
                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                </div>
            </div>
            <div class="row mb-2">
                <legend class="col-form-label col-sm-2 pt-0 ">Gender</legend>
                <div class="col-sm-10">
                    <span class="custom-control custom-radio custom-control-inline ">
                        <input type="radio" id="gender" name="gender" value="male" class="custom-control-input">
                        <label class="custom-control-label" for="gender">Male</label>
                    </span>
                    <span class="custom-control custom-radio custom-control-inline m-3">
                        <input type="radio" id="gender" name="gender" value="female" class="custom-control-input">
                        <label class="custom-control-label" for="gender">Female</label>
                    </span>
                    <span class="custom-control custom-radio custom-control-inline m-3">
                        <input type="radio" id="gender" name="gender" value="others" class="custom-control-input">
                        <label class="custom-control-label" for="gender">Others</label>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <span style="margin-left:450px;">Alreay a member? <a href=" /sandeep/login_system/login.php">LogIn</a></span>
            </div>
            <div class="form-group row ">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" style="margin-left:440px; width: 200px;">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>