<?php session_start(); ?>
<?php include("includes/dbconnect.php");
      include("includes/functions.php");  

    if(isset($_POST['clear_basket'])){
        //var_dump($_POST);
        $session_id=$_POST['session'];
        $sql="DELETE from basket where user_id='$session_id'";
        //echo  $sql;       
        $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
        header('location:index.php');
    }

    if(isset($_POST['send_order'])){
      header('location:order.php');
      //var_dump($_POST);
    }

   if(isset($_POST['delete_item'])){
    //vymazanie polozky z kosika
   }

   if(isset($_POST['save_item'])){
    //uloz zmeny v polozke

   }


 ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>E-shop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel='shortcut icon' href='shopping_cart.ico'>
    
<body>
    <header>
        <section class="logo"><a href="index.php">eshop</a></section><section class="basket"><a href="basket.php">Kosik</a></section>
    </header>
    <div id="middle_column">
                  
            <?php 

                $session=$_GET['session_id'];

            ?>
            <form action="basket.php" method="post">
                <input type="hidden" name="session" value="<?php echo $session; ?>">
                <table class="basket_list">

                    <tr><th><div style="width:20px;">#.</div></th><th><div style="width:500px">Product name</div></th><th><div style="width:50px">Price</div></th><th><div style="width:50px">Pcs</div></th><th style="width:50px">Total</th><th></th><th></th></tr>
                <?php     
                    $i=0;
                    
                    $sql="SELECT a.product_id, b.product_name, a.product_price,a.amount from basket a, products b where a.user_id='$session' and a.product_id=b.product_id";
                    //echo $sql;
                    $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                           //$item_id=$row['item_id'];
                           $product_id=$row['product_id'];
                           $product_name=$row['product_name'];
                            $product_price=$row['product_price'];
                            $amount=$row['amount'];
                           $total_price=$amount*$product_price;
                           $i++;
                     echo "<tr><td>$i</td><td class='prdct'><a href='product.php?product_id=$product_id'>$product_name</a></td><td>$product_price</td><td><input type='text' name='prod_amount' value=$amount class='qty'></td><td>$total_price</td><td><button type='submit' name='delete_item' class='flat-btn-small'>x</button></td><td><button type='submit' name='save_item' class='flat-btn-small'>Uloz</button></td></tr>";      

                    }
                   $sql="SELECT SUM(amount*product_price) from basket where user_id='$session'";
                    $price=mysql_result(mysql_query($sql),0);
                    //$price = mysql_fetch_array($result);
                    echo "<tr><td colspan=7>Celkova cena:$price</td></tr>";
                    echo "<tr><td colspan=7 style='text-align:right'><button name='send_order' type='submit' class='flat-btn'>Objednavka</button><button name='clear_basket' type='submit' class='flat-btn-small'>Zmaz</button></td></tr>";
                 ?>   
                   
                </table>
                <div class="basket_action"></div> 
            </form>
        
    </div>
    <footer></footer>
</body>    