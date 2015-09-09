<?php session_start(); ?>
<?php include("../includes/dbconnect.php");
	if(isset($_POST['add_manufacturer'])){
		header('location:manufacturer.php');
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
			<div class="add_session"><form action="manufacturers.php" method="post"><button name="add_manufacturer" type="submit" class="flat-btn">Add</button></form></div>

			<?php 
				echo "<table class='item_list'>";
				$sql="SELECT * from manufacturers";
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		                        while ($row = mysql_fetch_array($result)) {
		            				$man_id=$row['man_id'];
									$manufactuter_name=$row['man_name'];
									           		
					
					echo "<tr>";
						echo "<td><a href='manufactuter.php?man_id=$man_id'>$manufactuter_name</a></td>";		
					echo "</tr>";
					
					}
							
				echo "</table>";					
			?>
		</div>
		
	</div>
	<footer></footer>