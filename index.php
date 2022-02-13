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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transact_id = uniqid();
    $user_id = $row["id"];
    $address = $_POST["address"];
    $postcode = $_POST["postcode"];

    $query = "INSERT INTO orders VALUES('$transact_id', '$user_id', '$address', '$postcode')";
    mysqli_query($conn, $query);

    header("Location: checkout.php?transact_id=$transact_id");
}
?>

<?php include 'header.php';?>
    <title>Index </title>
</head>
<body>
    <?php include 'nav.php';?>
    <h1>Welcome, <?php echo $row["name"]; ?></h1>



    <div class="row">
  <div class="col-sm-4 col-md-push-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Order Summary</h4>
      </div>
      <div class="panel-body">
        <small>Below is your order summary &amp; totals.</small>
      </div>
      <div class="table-responsive">
        <table class="table">
        <tbody>
          <tr><th>Description</th><th>Amount</th></tr>
          <tr><td>Quantity in Cart</td><td>$100<span class="simpleCart_quantity"></span></td></tr>
          <tr><td>Amount</td><td>$75<span class="simpleCart_total"></span></td></tr>
          <tr><td>Tax</td><td>$95<span class="simpleCart_tax"></span></td></tr>
          <tr><td>Shipping/Delivery</td><td>$120<span class="simpleCart_shipping"></span></td></tr>
          </tbody>
       </table>
    </div>
    <div class="panel-footer">
    Total Orders for Today: $390<strong><span class="simpleCart_grandTotal"></span></strong>
    </div>
  </div>
</div> <!-- //end col-sm-4 -->
<div class="col-sm-8 col-md-pull-4">
  <form action="" id="contact" method="post" name="contact" role="form">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a class="btn btn-default pull-right" data-target="#blogrcart-view-modal" data-toggle="modal" href="javascript:;"><i class="fa fa-shopping-cart"></i> View Shopping Cart</a>
          <h3 style="margin: 0;">Send in Orders</h3>
          <small>Details submitted here will not be published.</small>
      </div>
      <div class="panel-body">
        <div class="form-group ">
           <label for="first_name">Name</label>
           <input disabled class="form-control" id="first_name" name="first_name" type="text" value="<?php echo $row["name"]; ?>"/>
        </div>

        <div class="form-group">
          <label for="email">Your E-mail</label>
          <input disabled class="form-control" id="email" name="email" type="email" value="<?php echo $row["email"]; ?>" />
        </div>

        <div class="form-group">
          <label for="phone">Phone</label>
          <input disabled class="form-control" id="phone" name="phone" type="tel" value="<?php echo $row["phone"]; ?>" />
        </div>

        <div class="form-group">
          <label for="address">Delivery Address</label>
          <textarea class="form-control" id="address" name="address" placeholder="" rows="5" required></textarea>
        </div>

        <div class="form-group">
          <label for="postcode">Postal Code</label>
          <input class="form-control" id="postcode" name="postcode" type="text" required/>
        </div>

        <div class="form-group">


      </div>
      <div class="panel-footer text-center">
        <button type="submit" class="btn btn-primary" id="send-order">Send Order</button>
      </div>
    </div>
  </form> 
</div> 
<div class="clearfix"></div>
</div> 





    <a href="logout.php">Logout</a>
</body>
</html>

