<?php session_start(); ?>
<?php include("includes/dbconnect.php"); ?>

<?php 
    if(isset($_POST['add_to_basket'])){
        var_dump($_POST);
        $session_id=$_POST['session_id'];
        $prod_id=intval($_POST['prod_id']);
        $amount=$_POST['prod_amount'];
        $product_price=$_POST['product_price'];
        $total_price=$amount*$product_price;

        $sql="INSERT INTO basket (user_id, product_id, product_price,amount) VALUES ('$session_id',$prod_id,$product_price, $amount) ON DUPLICATE KEY UPDATE amount=amount+$amount";
        echo $sql;
        
        $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
        $url="product.php?id=$prod_id";
        header('location:'.$url);
        
    }   

 ?>   


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel='shortcut icon' href='shopping_cart.ico'>
    
<body>
    <header>
       <section class="logo"><a href="index.php">eshop</a></section><section class="basket"><a href="basket.php?session_id=<?php echo session_id(); ?>">Kosik</a></section>
    </header>
    <div class="breadcrumb"></div>
    <?php
        $product_id=$_GET['id'];
        $session_id=session_id();
        $sql="SELECT * from products where product_id=$product_id";
        echo $sql;
        $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                    $product_id=$row['product_id'];
                                $product_name=$row['product_name'];
                                $product_picture=$row['product_picture'];
                                $product_price=$row['product_price'];
                                $product_description=$row['product_description'];
                                if($product_picture==""){
                                    $product_picture="images/no-product-image.png";
                                }
        }                              
    ?>
    <div id="middle_column">
        <div id="left_bar">
            <div class="prod_pic">
                
                <img src="<?php echo $product_picture; ?>">
                
            </div>
           <!-- fotka -->
        </div>
        <div id="content">
            <table class="prod_details">
                <tr><td style="font-weight:bold"><?php echo $product_name; ?></td></tr>
                <tr><td><?php echo $product_description; ?></td></tr>
                <tr><td><form action="product.php" method="post"><?php echo $product_price; ?><input type="text" name="prod_amount" value="1" class="qty"><input type="hidden" name="prod_id" value="<?php echo $product_id; ?>"><input type="hidden" name="session_id" value="<?php echo $session_id; ?>"><input type="hidden" name="product_price" value="<?php echo $product_price; ?>"><button name="add_to_basket" class="flat-btn" type="submit">Add</button><button name="add_to_wishlist" class="flat-btn-small" type="submit" title="Add to wishlist">+</button></form></td></tr> 
            </table>
            <!--popips produktu _ pridanie do kosika -->
        </div>
        
    </div>
    <footer></footer>
</body>    