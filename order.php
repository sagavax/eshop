<?php session_start(); ?>
<?php include("includes/dbconnect.php");
	  include("includes/functions.php"); 

if(isset($_POST['create_order'])){
	var_dump($_POST);
if(!isset($_POST['payment_type'])){
	echo "pozooooooooor, nevyznacil si platbu";
	//neoznacil som platbu alebo druh transport -> Alert
} else {
	$payment_type=$_POST['payment_type'];
} 

if (!isset($_POST['transport_type'])) {
	echo "pozooooooooor, nevyznacil si dopravu";
} else {
	$transport_type=$_POST['transport_type'];
}

$user_id=$_POST['user_id'];
$created_date=date('Y-m-d H:i:s');

$sql="INSERT INTO order_header (user_id,order_status,payment_method,transport_method,total_price,created_date) VALUES ('$user_id',0,$payment_type,$transport_type,'$created_date')";

echo "$sql";

$order_items="SELECT * from basket where user_id='$user_id'";
echo $order_items;
//$order_items="INSERT into order_items AS SELECT * from basket where user_id=$user_id";
 
//zmazat kosik
$delete_basket="DELETE from basket where user_id='user_id'";

/*	payment_type' => string '1' (length=1)
  'Uzivatel' => string '1' (length=1)
  'first_name' => string '' (length=0)
  'last_name' => string '' (length=0)
  'address' => string '' (length=0)
  'city' => string '' (length=0)
  'country' => string '' (length=0)
  'psc' => string '' (length=0)
  'email' => string '' (length=0)
  'product_description' => string '' (length=0) */

}
?>
<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel='shortcut icon' href='shopping_cart.ico'>
<body>
	<div class="page">
		<header>
       <section class="logo"><a href="index.php">eshop</a></section><section class="basket"><a href="basket.php?session_id=<?php echo session_id(); ?>">Kosik</a></section>
    </header>
	   <div id="middle_column">
	   		<form action="order.php" method="post">
		   	<input type="hidden" name="user_id" value="<?php echo session_id() ?>">
		   		<div class="products">
		   			<table class="basket_list">
			   			<?php 
				   			$session_id=session_id();
				   			
				   			 $sql="SELECT a.product_id, b.product_name, a.product_price,a.amount from basket a, products b where a.user_id='$session_id' and a.product_id=b.product_id";
			                    //echo $sql;
			                    $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
	                        while ($row = mysql_fetch_array($result)) {
	                           //$item_id=$row['item_id'];
	                           $product_id=$row['product_id'];
	                           $product_name=$row['product_name'];
	                            $product_price=$row['product_price'];
	                            $amount=$row['amount'];
	                           $total_price=$amount*$product_price;
	                           $i++;
	                     echo "<tr><td style='width:30px'>$i</td><td class='prdct'><a href='product.php?product_id=$product_id'>$product_name</a></td><td>$product_price</td><td><input type='text' name='prod_amount' value=$amount class='qty'></td><td>$total_price</td></tr>"; 
	                     } 	
	                   ?>  
                   </table>
		   		</div>	


		   		<div class="payment">
			   
			   		<?php			
			   			$sql="SELECT * from payment_method";
			   			 $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
			                while ($row = mysql_fetch_array($result)){
			                	$method_id=$row['method_id'];
			                	$method_name=$row['method_name'];
			                	echo "<input type='radio' name='payment_type' value=$method_id>$method_name";
		      	                }
		             ?>

		        </div>

		        <div class="transport">
		            <?php 

		            	$sql="SELECT * from transport_method";
			   			 $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
			             while ($row = mysql_fetch_array($result)){
			                	$metod_id=$row['method_id'];
			                	$method_name=$row['transport_name'];
			                	echo "<input type='radio' name='transport_type' value='$method_id'>$method_name";
		      	                }

		             	?>
		      	</div> 	         
			   	<div class="personal_data">	
			   		<!-- 

			   			1. )zisti ci user je zaregistrovany to jest ci sa session_id nachadza v databaze
			   			2. Ak je tak nacitaj osobne udaje z dbs
			   			3. Ak nie je tak ponukni zaregistrovanie + form na rucne vypisanie udajov
					
					-->	

			   		<table>
                     <tr><td>Fyzicka osoba: <input type="radio" name="druh_uzivatela" value="1" checked="checked">
                         	Firma: <input type="radio" name="druh_uzivatela" value="2"></td>
                      </tr>
                      
                    </table>
			   		
			   		<?php 
			   			 //skotroluj ci je uzivatel v databaze
			           $session_id=session_id();
			            $sql="SELECT * from users where user_id='$session_id'";
			           
			            $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
			            $num_rows=mysql_num_rows($result);
			           
			            if($num_rows==0){
			                 	//uzivatel nieje v db a nie je prihlaseny / registrovany / ponukne formular na vypnenenie
			            	$register=IsRegistered($session_id);
			            	if($register==FALSE){
			            		echo "User <b>is not</b> registered";
			            	} else {
			            		echo "User <b>is</b> registered";
			            	}
			            	
			            	echo "<table class='register_form'>";
								echo "<tr><td class='table_label'>Meno:</td><td><input name='first_name' value='' type='text'></td></tr>";
								echo "<tr><td class='table_label'>Priezvisko:</td><td><input name='last_name' value='' type='text'></td></tr>";	
								echo "<tr><td class='table_label'>Fakturacna adresa:</td><td><input name='address' value='' type='text'></td></tr>";
								echo "<tr><td class='table_label'>Mesto:</td><td><input type='text' name='city' value=''></td></tr>";
								echo "<tr><td class='table_label'>Krajina:</td><td><input type='text' name='country' value=''></td></tr>";
								echo "<tr><td class='table_label'>Psc:</td><td><input type='text' name='psc' value=''></td></tr>";
								echo "<tr><td class='table_label'>Email:</td><td><input type='text' name='email' value=''></td></tr>";
								echo "<tr><td class='table_label'>Poznamka:</td><td><textarea name='product_description'></textarea></td></tr>";
							echo "</table>";

			            } else {
				          
				            while ($row = mysql_fetch_array($result)){
				            echo "<table class='register_form'>";
								echo "<tr><td class='table_label'>Meno:</td><td><input name='first_name' value='' type='text'></td></tr>";
								echo "<tr><td class='table_label'>Priezvisko:</td><td><input name='last_name' value='' type='text'></td></tr>";	
								echo "<tr><td class='table_label'>Fakturacna adresa:</td><td><input name='address' value='' type='text'></td></tr>";
								echo "<tr><td class='table_label'>Mesto:</td><td><input type='text' name='city' value=''></td></tr>";
								echo "<tr><td class='table_label'>Krajina:</td><td><input type='text' name='country' value=''></td></tr>";
								echo "<tr><td class='table_label'>Psc:</td><td><input type='text' name='psc' value=''></td></tr>";
								echo "<tr><td class='table_label'>Email:</td><td><input type='text' name='email' value=''></td></tr>";
								echo "<tr><td class='table_label'>Poznamka:</td><td><textarea name='product_description'></textarea></td></tr>";
							echo "</table>";	
						}


			          }
			 	   	?>	
			 	   	<button type="sudmit" name="create_order" class="flat-btn">Objednaj</button>	
		   		</div>
	   		</form>
	   </div>
	</div>
	<footer>
	</footer>
</body>	   