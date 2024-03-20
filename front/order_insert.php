<?php include("admin/inc_files/dbconnect.php"); ?>
<?php
session_start();

if (isset($_POST['checkout'])) {

    $cart_id = $_POST['cart_id'];
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $pro_qty = $_POST['qnty'];

    $dt= new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $date_time=$dt->format('d-m-Y H:i:s');

    $sel = "SELECT * FROM add_cart_data WHERE user_name='$user_name' AND pro_id='$pro_id' ";
    $result = mysqli_query($con, $sel);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($pro_qty > 0) {

                    $ins = "INSERT INTO order_data SET pro_qty='$pro_qty',user_id='$user_id',user_name='$user_name',pro_price='$pro_price',pro_name='$pro_name',pro_id='$pro_id',cart_id='$cart_id',date_time='$date_time'";
                    
                    $ina = "INSERT INTO order_data SET 
                            bill_name='$bill_name',bill_email='$bill_email',
                            bill_phone='$bill_phone',bill_address='$bill_address',
                            ship_name='$ship_name',ship_email='$ship_email',
                            ship_phone='$ship_phone',ship_address='$ship_address',
                            date_time='$date_time'";

                    if (mysqli_query($con, $ins)) {

                            $del="DELETE FROM add_cart_data WHERE cart_id='$cart_id'";
                            $delc="DELETE FROM check_cart_data WHERE cart_id='$cart_id'";
                            if(mysqli_query($con,$del)){
                                header("location:checkout.php");
                            }else{
                                echo "Not Deleted item !";
                            }
                            header("location:checkout.php");
                        }else{
                            echo "Ordered is not Complete ";
                        }
            }else{
                echo "Product Quantity can not be 0 ";
                header("location:all_vegs.php");
            }
        }
    } 
} else {
    echo "Access denied !";
}
?>
