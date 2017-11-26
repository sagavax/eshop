<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); ?>
<?php 
	if(isset($_POST['add_new_cat'])){
		$cat_name=mysqli_real_escape_string($link, $_POST['cat_name']);
		$curr_date=date('Y-m-d');
		$sql="INSERT INTO product_categories (cat_name, added_date) VALUES ('$cat_name','$curr_date' )";
		$result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
		echo "<script>alert('Pridana nova kategoria');
		href.location='categories.php';
		exit;
		</script>
		";
	}

	if(isset($_POST['cat_view'])){
		
	}

	if(isset($_POST['cat_edit'])){
	  $id=$_POST['cat_id'];
	  header('location: categories_edit.php?cat_id='.$id);
	 exit; 
	  //header('location:categories_edit.php?cat_id='".$_POST['cat_id']."');
	}
	
	if(isset($_POST['cat_delete'])){
		
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
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
		<?php include "../includes/left_menu.php" ?><div style="clear:both"></div>
		</div>
		<div id="content">
			<div id="admin_categories">
				<table>
					<?php 
						$sql="SELECT * from product_categories";
						$result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
						while ($row = mysqli_fetch_array($result)) {
							$cat_id=$row['cat_id'];
							$cat_name=$row['cat_name'];
							$cat_description=$row['cat_description'];
							echo "<tr><td>$cat_name</td><td>$cat_description</td><td><form action='' method='post'><input type='hidden' name='cat_id' value='$cat_id'><ul><li><button name='cat_view' type='submit' class='flat-btn'>View</button></li><li><button name='cat_edit'  type='submit' class='flat-btn'>Edit</button></li><li><button name='cat_delete'  type='submit' class='flat-btn'>Delete</button></li></ul></form></td></tr>";
						}  
						echo "<tr><td colspan='3'><form action='' method='post'><input type='text' id='cat_name' name='cat_name'><button name='add_new_cat' type='submit' class='flat-btn'>+ Add new category</button></form></td></tr>"; 
					?>
				</table>	
			</div><!-- admin categories-->
			<div style="clear:both"></div>
		</div><!-- content -->
		
	</div><!--middle column -->
	<footer></footer>