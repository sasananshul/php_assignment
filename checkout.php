<?php 
require 'config.php';

#checking session
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $resut = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$id'");
    $row = mysqli_fetch_assoc($resut);
}
else{
    header("Location: login.php");
}

$transact_id =$_GET['transact_id'];


?>

<?php include 'header.php';?>
    <title>Index </title>
</head>
<body>
    <?php include 'nav.php';?>
    <h5>Order placed. Your transaction id is <?php echo $transact_id; ?></h1>
</body>
</html>
