<?php session_start(); ?>
<?php include("../includes/dbconnect.php");
	if(isset($_POST['add_category'])){
		header('location:product_category.php');
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
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
			<?php include "left_menu.php" ?>
		</div>
		<div id="content">
			<div class="add_session"><form action="product_categories.php" method="post"><button name="add_category" type="submit" class="flat-btn">Add category</button></form></div>
			<?php 
				$sql="SELECT * from product_categories";
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
				echo "<table class='item_list'>";
				while ($row = mysql_fetch_array($result)) {
					$cat_id=$row['cat_id'];
					$parent_id=$row['parent_id'];
					$cat_name=$row['category_name'];
					$cat_desc=$row['category_description'];

					$cat_description =$row['category_description'];	

					echo "<tr><td style='width:10%'>$cat_name</td></td><td>$cat_desc</td></tr>";

					}	
				echo "</table>";	
			?>
		</div>
		
	</div>
	<footer></footer>