<?php session_start(); ?>
<?php include("includes/dbconnect.php"); ?>
<?php include("includes/functions.php"); 
	
	if(isset($_POST['add_to_basket'])){
		//var_dump($_POST);
		$session_id=$_POST['session_id'];
		$prod_id=intval($_POST['prod_id']);
		$amount=$_POST['amount'];
		$product_price=$_POST['product_price'];
		$total_price=$amount*$product_price;

		$sql="INSERT INTO basket (user_id, product_id, product_price,amount) VALUES ('$session_id',$prod_id,$product_price, $amount) ON DUPLICATE KEY UPDATE amount=amount+$amount";
		//echo $sql;
		$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		//		header('location:index.php');	
		
	}	

	if(isset($_POST['add_to_wishlist'])){
		//skontroluj ci user je registrovany
		//ak je user registrovany pridaj to do wishlistu
		$register=IsRegistered($session_id);
			            	if($register==FALSE){
			            		echo "User <b>is not</b> registered";
			            	} else {
			            		echo "User <b>is</b> registered";
			            		$sql="INSERT INTO wishlist (user_id, product_id, product_price,amount) VALUES ('$session_id',$prod_id,$product_price, $amount) ON DUPLICATE KEY UPDATE amount=amount+$amount";
			            	}
		//ak nie je odmietni ho
	}


//$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());

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
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic,400italic' rel='stylesheet'>
    <link rel='shortcut icon' href='shopping_cart.ico'>
    
<body>
	<div class="page">
		<header>
			<section class="logo"><a href="index.php">eshop</a></section><section class="basket"><a href="basket.php?session_id=<?php echo session_id(); ?>">Kosik</a></section>
		
	   </header>
	   <div id="middle_column">
	   		<div id="left_bar">
			<ul class="categories">
			<?php 
				$sql="SELECT * from product_categories";
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                    	$cat_id=$row['cat_id'];
                    	$parent_id=$row['parent_id'];
                    	$cat_name=$row['category_name'];

                    	echo "<li><a href='index.php?cat_id=$cat_id'>$cat_name</a></li>";
                    }	
			?>	
			</ul>
		</div>
		<div id="content">
		<?php 
				$session_id=session_id();
				$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				//echo $current_url;

				if (isset($_GET['cat_id'])){
					$cat_id=$_GET['cat_id'];

					$cat_desc=GetCatdescr($cat_id);
					echo "<div class='cat_description'>$cat_desc</div>";
					echo "<div class='product_list'>";
					$sql="SELECT product_id,product_picture,product_name,product_price,on_stock from products where cat_id=$cat_id";
					echo "<table class='products'>";
						$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
			                while ($row = mysql_fetch_array($result)) {
			            		$product_id=$row['product_id'];
								$product_name=$row['product_name'];
								$product_picture=$row['product_picture'];
								$product_price=$row['product_price'];
								//$cat_description=$row['cat_description'];  
								   
								$on_stock=$row['on_stock'];     		
						
						echo "<tr>";
							echo "<td class='prod_pic_table'><img src='$product_picture'></td><td class='prod_name_table'><a href='product_details.php?id=$product_id'>$product_name</a></td><td class='prod_price_table'><form action='index.php' method='post'><input type='hidden' name='prod_id' value='$product_id'><input type='hidden' name='amount' value='1'><input type='hidden' name='product_price' value='$product_price'><input type='hidden' name='session_id' value=$session_id><button name='add_to_basket' class='flat-btn' type='submit'>Add</button></form></td><td class='prod_price_table'>$product_price</td>";		
						echo "</tr>";
					}
				echo "</table>";

				} else {	
			
				echo "<table class='products'>";
				$sql="SELECT * from products";
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		            while ($row = mysql_fetch_array($result)) {
		            		$product_id=$row['product_id'];
							$product_name=$row['product_name'];
							$product_picture=$row['product_picture'];
							$product_price=$row['product_price'];

					
					echo "<tr>";
						echo "<td class='prod_pic_table'><img src='$product_picture'></td><td class='prod_name_table'><a href='product.php?id=$product_id'>$product_name</a></td><td class='prod_price_table'><form action='index.php' method='post'><input type='hidden' name='prod_id' value='$product_id'><input type='hidden' name='amount' value='1'><input type='hidden' name='product_price' value='$product_price'><input type='hidden' name='session_id' value=$session_id><button name='add_to_basket' class='flat-btn-small' type='submit'>Add</button><button name='add_to_wishlist' class='flat-btn-small' type='submit' title='Add to wishlist'>+</button></form></td><td class='prod_price_table'>$product_price</td>";		
					echo "</tr>";
						}
				 echo "</div>"; //product list div		
					}	
			echo "</table>";				
			?>
			
		</div><div style="clear:both"></div>
	   </div>
	   <footer>
	   	
	   </footer>
	</div>

				
</div>
	