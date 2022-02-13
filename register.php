<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header('Location: index.php');
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $state = $_POST["state"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $dup = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' or email = '$email'");
    if(mysqli_num_rows($dup) > 0){
        echo
            "<script> alert('Username or email is already taken') </script>";
    }
    else{
        if($password == $cpassword){
            $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$phone', '$gender', '$state', '$password')";
            mysqli_query($conn, $query);
            header( "refresh:5; login.php" );
            echo '<div class="alert alert-success my-0" role="alert">
            Registered succsessfully! Redirecting to login page or click <a href="login.php">here</a> to log in.
          </div>';
        }
        else{
            echo
                "<script> alert('Confirm password does not match') </script>";
        }
    }
}
?>

<?php include 'header.php';?>

    <title>Register</title>
</head>
<body id="_register">
    <?php require 'nav.php'; ?>
    <div class="container">
    <h2 class="text-center">Register</h2>
        <form action="" method="post">
            <div class="column">
                <div class="col-md-6 offset-md-3">
                    <label for="name" class="my-3">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required autocomplete="OFF">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="username" class="my-3">Username</label>
                    <input type="text" name="username" id="username" required class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="email" class="my-3">Email</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="password" class="my-3">Password</label>
                    <input type="password" name="password" id="password" required class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="cpassword" class="my-3">Confirm password</label>
                    <input type="password" name="cpassword" id="cpassword" required class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <div><label for="" class="my-3">Gender</label></div>
                    <input type="radio" name="gender" value="Male" required>Male
                    <input type="radio" name="gender" value="Female" required>Female
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="phone" class="my-3">Phone number</label>
                    <input type="text" name="phone" id="phone" required class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="state" class="my-3">Select your state</label>
                    <select name="state" id="state" class="form-control" id="state">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                        </select>
                </div>
                <div class="col-md-6 offset-md-3">
                    <button type="submit" name="submit" class="btn btn-primary form-control my-3">Register</button>
                </div>
            </div>
        </form>
    </div>
    <style>
        .body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

    </style>

</body>
</html>