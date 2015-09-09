<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
			<form action="product.php" method="post">
			<table class="item_list">
				<tr>
					<td class="table_label">Article title:</td><td><input type="text" name="article_name" value=""></td>
				</tr>
				<tr>
					<td class="table_label">Article text:</td><td><textarea name="article_text"></textarea></td>
				</tr>
				<tr>
					<td class="table_label">Article source:</td><td><input name="article_source" value=""></td>
				</tr>
				<tr>
					<td colspan="2"><button name="add_article" class="flat-btn">Add article</button></td>
				</tr>
			</table>	
			
			</form>					
			
		</div>
		
	</div>
	<footer></footer