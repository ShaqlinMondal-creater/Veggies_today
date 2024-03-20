

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
      <div class="container" style="display:flex; flex-direction:column; gap:1vw; padding-top: 10px; padding-bottom: 10px;">
      <?php
                            if(isset($_SESSION['cs_id'])){
                                
                              $idc=$_SESSION['cs_id'];  
                            }
                            $c=1;
                            $sel="SELECT add_cart_data.*, product.picc FROM add_cart_data JOIN product ON add_cart_data.pro_id = product.id AND user_id='$idc'" ;
                $result=mysqli_query($con,$sel);
                while($rs=$result->fetch_assoc()){
            ?>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($_SESSION['cs_name'])){  ?>
                <tr>
                    <th scope="row"><?php echo $c; ?></th>
                    <td style="padding-bottom: 5vh; "><img src="admin/pll/<?php echo $rs['picc'];?>" style="height: 15vh; width: 6vw;"></td>
                    <td type="center"><?php echo $rs['pro_name'];?></td>
                    <td><?php echo $rs['pro_qty'];?></td>
                    <td>₹ <?php echo $rs['pro_price'] ;?></td>
                    <td><a href="delete_cart_item.php?cart_id=<?php echo $rs['cart_id'];?>" class="btn btn-danger">X</a></td>
                </tr>
                <?php }else{?>
                <tr>
                    <p type="text-center">EMPTY</p>
                </tr>
                    <?php } ?>    
            </tbody>
        </table>
        <?php 
            $c++;
            } ?>
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