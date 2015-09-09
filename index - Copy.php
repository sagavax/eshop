<?php session_start(); ?>
<?php include("includes/dbconnect.php"); ?>
<?php include("includes/functions.php"); ?>


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
    
<body>
	<header>
		<section class="logo">eshop</section><section class="basket"><a href="basket.php?session_id=<?php echo session_id(); ?>">Kosik</a></section>
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
                    	$cat_name=$row['cat_name'];

                    	echo "<li><a href='index.php?cat_id=$cat_id'</li>";
                    }	
			?>	
			</ul>
		</div>
		<div id="content">
		<?php 
				if (isset($_GET['cat_id'])){
					$cat_id=$_GET['cat_id'];
					$cat_desc=GetCatDesr($cat_id);

					echo "<div>$cat_desc</div>";

					$sql="SELECT * from products where cat_id=$cat_id";
					echo "<table>";
						$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
			                        while ($row = mysql_fetch_array($result)) {
			            				$product_id=$row['product_id'];
										$product_name=$row['product_name'];
										$product_picture=$row['product_picture'];
										$product_price=$row['product_price'];            		
						
						echo "<tr>";
							echo "<td><img src='$product_picture'></td><td><a href='product_details.php?id=$product_id>'$product_name</a></td><td>$product_price</td>";		
						echo "</tr>";
					}
				echo "</table>";
				} else {	
			
				$sql="SELECT * from products";
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		                        while ($row = mysql_fetch_array($result)) {
		            				$product_id=$row['product_id'];
									$product_name=$row['product_name'];
									$product_picture=$row['product_picture'];
									$product_price=$row['product_price'];            		
					
					echo "<tr>";
						echo "<td><img src='$product_picture'></td><td><a href='product_details.php?id=$product_id>'$product_name</a></td><td>$product_price</td>";		
					echo "</tr>";
								}
					}			
			?>
		</table>
		</div>

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
