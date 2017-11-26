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
    <script src="../js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    
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
                <tr><td>Meno produktu:</td><td><input type="product_name"></td>
                <tr><td>Meno produktu (EN):</td><td><input type="product_name_EN"></td>	
                <tr><td>Popis produktu:</td><td><texarea name="product_description"></textarea></td>
                <tr><td>Popis produktu (EN):</td><td><texarea name="product_description_EN"></textarea></td>
                <tr><td>Cena:</td><td><input type="text" name="product_price"></td></tr>
                <tr><td>Mnostvo:</td><td><input type="text" name="product_amount"></td></tr>
                <tr><td>Obrazok:</td><td><input type="file" name="product_picture"></td>
                <tr><td colspan="2"><form action="" method="post"><button type="submit" name="add_product" class="flat-btn"><i class="fa fa-plus">Pridat_product</button></form></td></tr>
			</table>		   
		</div>
		
	</div>
	<footer></footer>
</body>	