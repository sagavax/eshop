<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="../css/style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
		<?php include "../includes/left_menu.php" ?>
		</div>
		<div id="content">
			<table>
				<?php
				$sql="SELECT * from products";
				$result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
				while ($row = mysqli_fetch_array($result)) {
						$product_id=$row['product_id'];
						$product_name=$row['product_name'];
						$product_picture=$row['product_picture'];
						$product_price=$row['product_price'];        


				}	
				?>
				<tr><td></tr>		
			</table>		   
		</div>
		
	</div>
	<footer></footer>
</body>	