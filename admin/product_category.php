<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); 
	if(isset($_POST['add_category'])){
		$category_name=mysql_real_escape_string($_POST['category_name']);
		$category_description=mysql_real_escape_string($_POST['category_description']);
		$parent_category=intval($_POST['parent_category']);
		$added_date=date('Y-m-d H:i:s');
		$sql="INSERT INTO product_categories (category_name,parent_id,category_description,added_date) VALUES ('$category_name',$parent_category,'$category_description','$added_date')";
		$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		header('location:product_categories.php');
		//}
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
			<form action="product_category.php" method="post">
				<table class="item_list">
					<tr>
						<td class="table_label">Meno kategorie:</td><td><input name="category_name" value="">*</td>	
					</tr>
					
					<tr>
						<td class="table_label">Popis kategorie</td><td><textarea name="category_description"></textarea></td>
					</tr>
					<tr>
						<td class="table_label">Parent kategoria:</td><td><select name="parent_category">
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
						<td colspan="2"><button name="add_category" type="submit" class="flat-btn">Done</button></td>
					</tr>				
				</table>				
			</form>
		</div>
		
	</div>
	<footer></footer>