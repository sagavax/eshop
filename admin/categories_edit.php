<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); ?>
<?php 
   if(isset($_POST['ulozit_zmeny'])) {
	   $cat_id=$_POST['cat_id'];
	   $cat_name=mysqli_real_escape_string($link, $_POST['cat_name']);
	   $cat_name_EN=mysqli_real_escape_string($link, $_POST['cat_name_EN']);
	   $cat_description=mysqli_real_escape_string($link, $_POST['cat_description']);
	   $cat_description_EN=mysqli_real_escape_string($link, $_POST['cat_description_EN']);
	   $sql="UPDATE product_categories SET cat_name='$cat_name', cat_name_EN='$cat_name_EN', cat_description='$cat_description', cat_description_EN='$cat_description_EN' where cat_id=$cat_id";  
	   $result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
	   echo "<script>alert('Produkt bol updatnuty!');
	   location.href='categories.php';
	   exit;  
	   </script>";
   }
?>

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
			<div id="admin_categories">
				<form action="" method="post">
					<table>
						<?php 
							$sql="SELECT * from product_categories where cat_id=".$_GET['cat_id'];
							$result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
							while ($row = mysqli_fetch_array($result)) {
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								$cat_name_EN=$row['cat_name_EN'];
								$cat_description=$row['cat_description'];
								$cat_description_EN=$row['cat_description_EN'];
								echo "<input type='hidden' value='$cat_id' name='cat_id' />";
								echo "<tr><td>Kategoria:<td><input type='text' name='cat_name' value='$cat_name'></td><tr>
									<tr><td>Kategoria (EN):<td><input type='text' name='cat_name_EN' value='$cat_name_EN'></td><tr>
									<tr><td>Popis kategorie:</td><td><textarea name='cat_description'>$cat_description</textarea></td></tr>
									<tr><td>Popis kategorie (EN):</td><td><textarea name='cat_description_EN'>$cat_description_EN</textarea></tr>
									<tr><td colspan='2'><button type='submit' name='ulozit_zmeny' class='flat-btn'>Save</button></td></tr>";
							}  
							
						?>
					</table>	
				</form>
			</div><!-- admin categories-->
			<div style="clear:both"></div>
		</div><!-- content -->
		
	</div><!--middle column -->
	<footer></footer>