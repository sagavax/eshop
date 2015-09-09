<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); 

	if(isset($_POST['add_product'])){
			//var_dump($_POST);
			
			$product_name=mysql_real_escape_string($_POST['product_name']);
			$manufacturer=mysql_real_escape_string($_POST['product_manufacturers']);
			$product_code=mysql_real_escape_string($_POST['product_code']);
			$product_description=mysql_real_escape_string($_POST['product_description']);
			$product_price=$_POST['product_price'];
			$product_amount=intval($_POST['product_amount']);
			$product_category=intval($_POST['product_category']);
			$product_picture=$_POST['product_picture'];
			
			if($product_picture==''){
				$product_picture="images/no-product-image.png";				
			} else {
				$product_picture=mysql_real_escape_string($_POST['product_picture']);

			} 


			if($product_amount>0){
				$on_stock=1;
			}
			$hits=0;
			$created_date=date('Y-m-d H:i:s');
			//echo "Obrazok:".$product_picture;
			$sql="INSERT into products (product_name,product_code,product_description, product_picture,cat_id,manufacturer,product_price,on_stock,amount,hits,created_date ) VALUES ('$product_name','$product_code','$product_description','$product_picture',$product_category,'$manufacturer',$product_price,$on_stock,$product_amount,$hits,'$created_date')";
			//echo $sql;
			$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		
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
			
			<form action="product.php" method="post">
				<table class="item_list">
					<tr>
						<td class="table_label">Obrazok produktu:</td><td><input name="product_picture" value="" type="text"></td>	
					</tr>
					<tr>
						<td class="table_label">Meno produktu:</td><td><input name="product_name" value="" type="text"></td>	
					</tr>
					<tr>
						<td class="table_label">Kod produktu:</td><td><input name="product_code" value="" type="text"></td>
					</tr>
					<tr>
						<td class="table_label">Popis produktu:</td><td><textarea name="product_description"></textarea></td>
					</tr>
					<tr>
						<td class="table_label">Vyrobca:</td><td><select name="product_manufacturers">
													<?php 
														$sql="SELECT * from manufacturers";
														$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
														echo "<option value='0'>-- select manufacturer --</option>";
														while ($row = mysql_fetch_array($result)) {
																echo "<option value='".$row['man_id']."'>".$row['man_name']."</option>";
															}
													?>
												</select></td>
					</tr>
					<tr>
						<td class="table_label">Kategoria:</td><td><select name="product_category">
													<?php 
														$sql="SELECT * from product_categories";
														$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
														echo "<option value='0'>-- select category --</option>";
														while ($row = mysql_fetch_array($result)) {
																echo "<option value='".$row['cat_id']."'>".$row['category_name']."</option>";
															}
													?>
												</select>
						</td>
					</tr>
					<tr>
						<td class="table_label">Mnozstvo (ks):</td><td><input type="text" name="product_amount"></td>
					</tr>
					<tr>
						<td class="table_label">Cena (ks):</td><td><input type="text" name="product_price"></td>
					</tr>
					<tr>
						<td colspan="2"><button name="add_product" type="submit" class="flat-btn">Done</button></td>
					</tr>				
				</table>				
			</form>

		</div>
		
	</div>
	<footer></footer>