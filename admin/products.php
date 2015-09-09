<?php session_start(); ?>
<?php include("../includes/dbconnect.php");
	if(isset($_POST['add_product'])){
		header('location:product.php');
	}
	if(isset($_POST['product_delete'])){
		$product_id=$_POST['product_id'];
		$sql="DELETE from products WHERE product_id=$product_id";
		 $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
	}

	if(isset($_POST['product_update'])){

	}
 ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <title>Eshop - admin</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel='shortcut icon' href='../shopping_cart.ico'>
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
			<?php include "left_menu.php" ?>
		</div>
		<div id="content">
			<div class="add_session"><form action="products.php" method="post"><button name="add_product" type="submit" class="flat-btn">Add product</button></form></div>

			<?php 
				echo "<table class='item_list'>";
				$sql="SELECT * from products";
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		                        while ($row = mysql_fetch_array($result)) {
		            				$product_id=$row['product_id'];
									$product_name=$row['product_name'];
									$product_picture=$row['product_picture'];
									$product_description=$row['product_description'];
									$product_amount=$row['amount'];
									$product_price=$row['product_price'];            		
					
					echo "<tr>";
						echo "<td class='prod_pic_table'><img src=".'../'."$product_picture></td><td class='prod_name_table'><input type='text' name='product_name' value='$product_name'><br><textarea name='product_description'>$product_description</textarea></td><td class='product_event'><select name='product_event'>
								<option value=0>Defaut</option>
								<option value=1>Action</option>
								<option value=2>Sale</option>
								</select></td><td class='prod_amount_table'><input type='text' value=$product_amount name='product_amount' class='input_number'></td><td class='prod_price_table'><input type='text' value=$product_price name='$product_price' class='input_number'></td><td class='product_action'><form><button name='product_delete' class='flat-btn-small'>x</button><button name='product_update' type='submit' class='flat-btn-small'>Save</button></form></td>";		
					echo "</tr>";
								}
							
				echo "</table>";					
			?>
		</div>
		
	</div>
	<footer></footer>