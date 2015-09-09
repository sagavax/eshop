<?php session_start(); ?>
<?php include("../includes/dbconnect.php");
	  include("../includes/functions.php");
if(isset($_POST['order_confirm'])){ //objednavka je potvrdene

 $sql="UPDATE order_header SET $order_status=2, $total_price=0 WHERE order_id=$order_id";
 $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error()); 
 $create_invoice($order_id);	
 	//vytvor fakturu
}
if(isset($_POST['order_cancel'])){
	$order_id=intval($_POST['order_id']);
	//$order_status=2;
	$sql="UPDATE order_header SET $order_status=2, $total_price=0 WHERE order_id=$order_id";
	$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
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
    <link rel='shortcut icon' href='shopping_cart.ico'>
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
			<?php include "left_menu.php" ?>
		</div>
		<div id="content">
			
			<?php 

				$sql="SELECT * from order_header"; //(order items)
				$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
		                        while ($row = mysql_fetch_array($result)) {
		            	         $is_confirmed=$row['is_confirmed'];   		
								if($is_confirmed==1){
									$order_status="confirmed";
								} elseif ($is_confirmed==0){
									$order_status="uncorfirmed";
								}	
								$customer_id=$row['user_id'];
								$total_price=$row['total_price'];
					echo "<tr>";
						echo "<td>$order_id</td><td>$customer_id</td><td>$order_status</td><td>$total_price</td><td><form action='orders.php' method='post'><input type='hidden' name='order_id' value=$order_id><button type='submit' name='order_confirm'>OK</button><button type='submit' name='order_cancel'>cancel</button></form></td>";		
					echo "</tr>";
								}
							

			?>
		</div>
		
	</div>
	<footer></footer>