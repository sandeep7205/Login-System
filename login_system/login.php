<?php
// $login = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "/xampp/htdocs/sandeep/login_system/other_files/conn.php";
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
    $sql_slct = "SELECT * FROM `user` WHERE `email`='$email'"; //AND `password`='$password'";
    $slct_result = mysqli_query($conn, $sql_slct);
    $slct_num = mysqli_num_rows($slct_result);
    if ($slct_num == 1) {
        // $login = true;
        //verifing the hash password
        while ($row = mysqli_fetch_assoc($slct_result)) {
            // echo var_dump($row);
            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("location: main.php");
            } else {
                $showerror = "Invalid Credentials!!!";
            }
        }
    } else {
        $showerror = "Invalid Credentials!!!";
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

    <title>Log In</title>
</head>

<body>
    <?php require 'other_files/nav_bar.php' ?>
    <?php
    // if ($login) {
    //     echo '<div class="alert alert-success">
    // <strong>Success!</strong> Your Entry was successfully Logged In</div>';
    // }
    if ($showerror) {
        echo "<div class='alert alert-danger'>
    <strong>ERROR!</strong> $showerror </div>";
    }
    ?>
    <div class="container">
        <h3 class="mx-auto" style="width: 170px; margin-top:10px">Log In</h3>
        <form action="/sandeep/login_system/login.php" method="post">
            <div class="form-group row mt-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row mt-3 mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" style="margin-left:440px; width: 200px;">Log In</button>
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