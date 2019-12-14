<?php
  include_once 'inc/Database.php';
  include 'inc/head.php';
  $db = new Database();
?>

<main class='container'>
  <?php 
    var_dump($_SESSION); 
  ?>
	<h2 class='text-center'>Your Cart</h2>
	<table class="table well">
		<thead>
			<tr>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th></th>
      </tr>
    </theard>
    <tbody>
      <?php
        var_dump($_SESSION);
        if(isset($_SESSION['cart'])){
          $html = "";
          for($i=0;$i<sizeof($_SESSION['cart']);$i++){
            $sql = "SELECT `name`, `price` FROM products
              WHERE `id`=".$_SESSION['cart'][$i];
            $result = $db->select($sql);
            $html .= "<tr>";
            $html .= "<td>".$result[0]['name']."</td>";
            $html .= "<td>".$result[0]['price']."</td>";
            $html .= "<td>12</td>
            <td>$60.00</td>
            <td>
              <form action='' method='POST'>
                <input type='hidden' name='productID' value='121'>
                <button type='submit' class='btn btn-danger'>Remove from Cart</button>
              </form>
            </td>
            </tr>";
          }  
          echo $html;
        }
        else{
          echo"<p>No products in cart</p>";
        }
      ?>
      <tr>
        <td>Golf Balls</td>
        <td>$5.00</td>
        <td>12</td>
        <td>$60.00</td>
        <td>
          <form action="" method="POST">
            <input type="hidden" name="productID" value="121">
            <button type="submit" class="btn btn-danger">Remove from Cart</button>
          </form>
        </td>
      </tr>
      <tr>
        <td>Golf Clubs</td>
        <td>$1,800.00</td>
        <td>1</td>
        <td>$1,800.00</td>
        <td>
          <form action="" method="POST">
            <input type="hidden" name="productID" value="315">
            <button type="submit" class="btn btn-danger">Remove from Cart</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4 well text-center">
      <p>Total (2 Items): <strong>$1860.00</strong></p>
      <form action="" method="POST">
        <button type="submit" class="btn btn-primary" name="proceedToCheckout">Proceed To Checkout</button>
      </form>
    </div>
    <div class="col-md-4">
    </div>
  </div>
</main>
<!--footer-->
<?php include "inc/foot.php"; ?>
