<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header('Location: index.php');
}
    if(isset($_POST["submit"])){
        $usernameoremail = $_POST["usernameemail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameoremail' OR email = '$usernameoremail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION['login'] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
            }
        else{
            echo
                "<script> alert('Incorrect password') </script>";
            }    
        }
        else{
            echo
                "<script> alert('User not registered') </script>";
        }
    }
?>

<?php include 'header.php';?>
    <title>Login</title>
</head>
<body id="_login">
    <?php require 'nav.php'; ?>
    <div class="container">
        <h2 class="text-center">Login</h2>
        <form action="" method="post">
            <div class="column">
                <div class="col-md-6 offset-md-3">
                    <label for="usernameemail" class="my-3">Username or Email: </label>
                    <input type="text" name="usernameemail" id="usernameemail" class="form-control" required
                        autocomplete="OFF">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="password" class="my-3">Password: </label>
                    <input type="password" name="password" id="password" required class="form-control">
                </div>
                <div class="col-md-6 offset-md-3">
                    <button type="submit" name="submit" class="btn btn-primary form-control my-3">Login</button>
                </div>

                <div class="text-center">
                    <a href="register.php">Register here</a>
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

        a{
            text-decoration: none;
        }
        .container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>
</body>
</html>