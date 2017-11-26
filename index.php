<?php session_start(); ?>
<?php include("includes/dbconnect.php"); ?>
<?php include("includes/functions.php"); ?>

<?php 
	if(isset($_POST['add_to_basket'])){
     $sql="INSERT INTO basket (prod_id,amount,price,) VALUES ($prod_id, $amout, $price, $amount*$price)";
	}

?>

<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="css/style.css?<?php echo time() ?>" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	
    
<body>
	<header>
		<section class="logo"></section><section class="basket"><a href="basket.php">Kosik</a></section>
	</header>
	<div class="menu">

	</div>

	<div id="middle_column">
		<div id="left_bar">
			<div id="product_categories">
				<div class="cat_header">
				<i class="fa fa-bars"></i> zoznam kategorii
				</div>
				<div class="cat_list">
					<ul>
						<?php 
							$sql="SELECT * from product_categories";
							$result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
							while ($row = mysqli_fetch_array($result)) {
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								$cat_description=$row['cat_description'];
							echo "<li><i class='fa fa-times'></i> <a href='index.php?cat_id=$cat_id'>$cat_name</a></li>";		
							}	
					
						?>
					</ul>
				</div><!--cat list-->
			</div><!--product categories-->	
		</div><!-- left bar-->
		<div id="content">
			<?php 

               global $link;			   

			   if(isset($_GET['cat_id'])){ //ak kliknem na kategoriu
				   $sql="SELECT * from products where cat_id=$cat_id";
			   } else  {
				  $sql="SELECT * from products";
			   }
			   echo "<div id='product_list_header'><ul><li><a href=''><i class='fa fa-th-large'></i></a></li><li><a href=''><i class='fa fa-list'></i></a></li></ul></div>";
			   echo "<ul class='product_list'>";
			   
			   $result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
			   while ($row = mysqli_fetch_array($result)) {
				   $product_id=$row['product_id'];
				   $product_name=$row['product_name'];
				   $product_picture=$row['product_picture'];
				   $product_price=$row['product_price'];            		
   
					echo "<li><div class='card'>";
					echo "<div class='product_name'>$product_name</div>";
					echo "<div class='product_image'><img src='$path_to_image'></div>";
					echo "<div class='card_footer'>$product_price <form action='' method=''post><button name='add_to_basket'>+Add to basket</buttton></form></div>";
					echo "</li></div>";
			   }
				?>
			</ul>
		</div>
		<div id="latest_articles">
			<ul>
			<?php
				$sql="SELECT * from articles ORDER BY art_id DESC LIMIT 3";
				$result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
				while ($row = mysqli_fetch_array($result)) {
					$art_id=$row['art_id'];
					$art_title=$row['article_title'];
					$art_text=$row['article_text'];
					$art_date=$row['article_date'];
					$art_image=$row['article_image'];

				 echo "<li><div class='blog_post'>

				 </div></li>";	
				}	
			   echo "</ul>";
			?>
		</div>	
        <div style="clear:both"></div>
	</div>
	<footer>
		<section id="guestbook">
				<form action="index.php" method="POST">
					<table>
						<tr><td><input type="text" name="kontakt_meno"></td></tr>
						<tr><td><input type="text" name="kontakt_email" value="@"></td></tr>
						<tr><td><textarea name="kontakt_text"></textarea></td></tr>
						<tr><td><button type="submit" name="posli_guest">Send</button></td></tr>
				</form>

		</section>	

	</footer>
</body>