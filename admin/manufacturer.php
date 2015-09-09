<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); 

	if(isset($_POST['add_manufacturer'])){
			//var_dump($_POST);
			//echo "hovno";
			$manufacturer_name=mysql_real_escape_string($_POST['manufakturer_name']);
			$manufacturer_description=mysql_real_escape_string($_POST['manufaturer_description']);
			$manufacturer_url=mysql_real_escape_string($_POST['manufacturer_url']);
			
			$sql="INSERT into manufacturers (man_name,man_description,man_url) VALUES ('$manufacturer_name','$manufacturer_description','$manufacturer_url')";
			//echo $sql;
			$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
			//header('location:manufacturers.php');
	}


?>



<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <title>Eshop - admin</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="../shopping_cart.ico">
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
			<?php include "left_menu.php" ?>
		</div>
		<div id="content">
			
			<form action="manufacturer.php" method="post">
				<table class="item_list">
					<tr>
						<td class="table_label">Vyrobca:</td><td><input name="manufakturer_name" value="" type="text"></td>	
					</tr>
				     <tr>
						<td class="table_label">Popis Vyrobcu:</td><td><textarea name="manufaturer_description"></textarea></td>
					</tr>
					<tr>
						<td class="table_label">Adresa:</td><td><input name="manufacturer_url" value="" type="text"></textarea></td>
					</tr>
					
					<tr>
						<td colspan="2"><button name="add_manufacturer" type="submit" class="flat-btn">Done</button></td>
					</tr>				
				</table>				
			</form>

		</div>
		
	</div>
	<footer></footer>