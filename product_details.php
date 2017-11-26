<?php session_start(); ?>
<?php include("include/dbconnect.php"); ?>

<?php 
	if (isset($_POST['']))



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
    

	<?php  $product_id=$_GET['id'] ?>

	<body>
	<header>
		<section class="logo"></section><section class="basket"><a href="basket.php">Kosik</a></section>
	</header>
	
	
	<?php 
		$sql="SELECT * from products where product_id=$product_id";
		$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		                        while ($row = mysql_fetch_array($result)) {
		                        	$price=$row['product_price'];
									$product_name=$row['product_name'];
									$product_picture=$row['product_picture'];
									$product_description=$row['product_description'];
									
	?>	                        	
	<div id="middle_column">
		<div class="product_detail_wrap">
			<div class="product_picture"><img src="<?php echo $product_picture?>"></div>
			<div class="product_description_wrap">
				<div class="product_name"></div><div class="product_price"><?php echo $product_price ?></div>
				<div class="product_description"><?php echo $product_description ?></div>
				<div class="product_action">
					
					<form action="product_details.php" method="post">
						<input type="hidden" name="product_id" value="<?php echo $product_id ?>" />
						<input type="text" name="qty" value="1"/>
					   	<button type="submit" name="to_basket">Do kosika</button>
					</form>
					</div>
			</div>
			
		</div>
	   <?php } ?>	
	</div>
	<footer></footer>	