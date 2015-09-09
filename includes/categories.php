<?php 
	include ("dbconnect.php");

	$sql="SELECT * from prodcut_categories";
	$result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
	echo "<ul>"
	while(($row = mysql_fetch_array($result)) {
		$cat_id=$row['cat_id'];
		$parent_id=$row['parent_id'];
		$cat_name=$row['cat_name'];

		$cat_description =$row['cat_description']	

	}
	

?>
