<?php include("admin/inc_files/dbconnect.php"); ?>
<?php
session_start();
if(!isset($_SESSION['cs_name'] )){
    header("location:index.php");
  }
  $name=$_SESSION['cs_name'];
  $id=$_SESSION['cs_id'];

// $name=$_SESSION['cs_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("veg_inc/head_link.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
  <!--header section start -->
  <div class="header_section">
    <div class="container-fluid">
    <?php include("veg_inc/nav.php"); ?>
    </div>
  </div>
  <!--header section end -->
  <!--about section start -->
  <div class="about_section layout_padding">
      <div class="container">
          <div class="col-md-12" align="center" style="background:linear-gradient(45deg,burlywood, lightgreen); border-radius:5px;">
              <h2>CHECKOUT</h2>
          </div>
          <br>
        <?php
          if(isset($_SESSION['cs_id'])){
                                
            $idc=$_SESSION['cs_id'];  
          }
            $c=1;
            $sel="SELECT check_cart_data.*, product.picc FROM check_cart_data JOIN product ON check_cart_data.pro_id = product.id AND user_id='$idc'" ;
            $result=mysqli_query($con,$sel);
            if($result->num_rows>0){
            while($rs=$result->fetch_assoc()){
        ?>
        <table class="table ">
            <thead hidden>
                <tr>
                    <th scope="col" class="col-md-2 text-center">SL</th>
                    <th scope="col" class="col-md-2 text-center">IMAGE</th>
                    <th scope="col" class="col-md-2 text-center">PRODUCT</th>
                    <th scope="col" class="col-md-2 text-center">QUANTITY</th>
                    <th scope="col" class="col-md-2 text-center">PRICE</th>
                    <th scope="col" class="col-md-2 text-center">DELETE</th>

                    <!-- <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th> -->
                </tr>
            </thead>
            <tbody>
                <?php if(isset($_SESSION['cs_name'])){  ?>
                <tr>
                    <th scope="row" class="col-md-2 text-center"><?php echo $rs['c_cart_id'];?></th>
                    <td class="col-md-2 text-center" ><img src="admin/pll/<?php echo $rs['picc'];?>" style="height: 15vh; width: 6vw;"></td>
                    <td class="col-md-2 text-center"><?php echo $rs['pro_name'];?></td>
                    
                    <?php if(isset($_SESSION['cs_name'])){  ?>
                      <!-- <form action="order_insert.php" method="post"> -->
                          <input hidden type="text" name="cart_id" value="<?php echo $rs['cart_id'];?>">
                          <input hidden type="text" name="pro_id" value="<?php echo $rs['pro_id'];?>">
                          <input hidden type="text" name="pro_name" value="<?php echo $rs['pro_name'];?>">
                          <input hidden type="text" name="pro_price" value="<?php echo $rs['pro_price'];?>">
                          <input hidden type="text" name="user_name" value="<?php echo $rs['user_name'];?>">
                          <input hidden type="text" name="user_id" value="<?php echo $rs['user_id'];?>">
                          <td class="col-md-2 text-center" ><span style="color:red;">Quantity of <?php echo $rs['pro_qty'];?>: </span></td>
                          <td class="col-md-4 text-center" > ₹ <?php echo $rs['pro_price'] * $rs['pro_qty'] ;?> .00/- </td>
                          <!-- <td class="col-md-2 text-center d-flex row space-between" >
                            <a href="delete_cart_item.php?cart_id=<?php echo $rs['cart_id'];?>" class="btn btn-danger">✕</a>
                            <br>
                            <input type="submit" style="font-size: larger;" class="btn btn-success" name="checkout" value="✓">
                          </td> -->

                      <!-- </form> -->
                    <?php } ?>
                </tr>
                <?php } ?>    
            </tbody>
        </table>
          <?php 
            $c++;
            }
            ?>
            <!-- <div class="cb" align="right">
                <a href="checkout.php?u_id=<?php echo $_SESSION['cs_name'];?>" class="btn btn-warning">CHECKOUT</a>
            </div> -->
            <?php
              } 
            ?>
          <form action="order_insert.php" method="post">
          <div class="col-md-12" align="center">
                <h2>Address</h2>
            </div>
            <!-- background: burlywood;
            background:lightgreen;  -->
            <div class="row" style="display:flex; justify-content:space-between; background:linear-gradient(45deg,burlywood, lightgreen); border-radius:5px;">
              <div class="col-md-6" style=" border-radius:5px;">
                <p>Billing Address</p>
                <p><input type="text" class="form-control" id="bn" placeholder="user name" name="bil_name"></p>
                <p><input type="text" class="form-control" id="be" placeholder="user email" name="bil_email"></p>
                <p><input type="text" class="form-control" id="bp" placeholder="user phone" name="bil_phone"></p>
                <p><input type="text" class="form-control" id="ba" placeholder="user address" name="bil_address"></p>
              </div>
              
              <div class="col-md-6" style="border-radius:5px;">
                <p>Shipping Address <span style="color:red;">(Same as Billing Address) <input type="checkbox" id="checkbox">  </span></p>
                <p><input type="text" class="form-control" id="sn" placeholder="user name" name="ship_name"></p>
                <p><input type="text" class="form-control" id="se" placeholder="user email" name="ship_email"></p>
                <p><input type="text" class="form-control" id="sp" placeholder="user phone" name="ship_phone"></p>
                <p><input type="text" class="form-control" id="sa" placeholder="user address" name="ship_address"></p>
              </div>
            </div>
            <br>
            <div class="cb" align="right">
                <input type="submit" name="order" value="Checkout Proceed" class="btn btn-warning">
            </div>
          </form>
            
      </div>
        <br>

  </div>
  
  <!--about section end -->
  <br><br>
  <!--footer section start -->
  <?php include("veg_inc/footer.php"); ?>
  <!--footer section end -->
  <!--copyright section start -->
  <?php include("veg_inc/copyright.php"); ?>
  <!--copyright section end -->
  <script>
    $('#checkbox').click(function(){

      if($('#checkbox').prop("checked")==true){
            $('#sn').val( $('#bn').val() );
            $('#se').val( $('#be').val() );
            $('#sp').val( $('#bp').val() );
            $('#sa').val( $('#ba').val() );
      }else{
            $('#sn').val("");
            $('#se').val("");
            $('#sp').val("");
            $('#sa').val(""); 
      }
    })
  </script>
  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- javascript --> 
  <script src="js/owl.carousel.js"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>