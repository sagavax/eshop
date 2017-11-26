<?php session_start(); ?>
<?php include("includes/dbconnect.php"); ?>
<?php include("includes/functions.php"); ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="css/style.css?<?php echo time() ?>" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    
<body>
	<header>
		<section class="logo"></section><section class="basket"><a href="basket.php">Kosik</a></section>
	</header>
	<div class="menu">

	</div>
	
	<div id="middle_column">
		<div id="basket">
                <?php 
                    $sql="SELECT * from basket";
                    $result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
                    while ($row = mysqli_fetch_array($result)) {
                    }   

                ?>

        </div>

	</div>
	<footer>
		<section id="guestbook">
				<form action="index.php" method="POST">
					<table>
						<tr><td><input type="text" name="kontakt_meno"></td></tr>
						<tr><td><input type="text" name="kontakt_email" value="@"></td></tr>
						<tr><td><textarea name="kontakt_text"></textarea></td></tr>
						<tr><td><button type="submit" name="posli_guest">Send</button></td></tr>
				</form>

		</section>	

	</footer>
